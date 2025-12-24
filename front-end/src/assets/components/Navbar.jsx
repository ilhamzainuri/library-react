import { Menu, X, User, Search, ChevronDown } from "lucide-react";
import { useEffect, useState, useRef } from "react";
import { useSearch } from "./SearchContext";
import logo from "../images/LOGO.png";

const API_URL = "http://localhost/library-react/back-end";

export default function NavbarFixed() {
  const [mobileOpen, setMobileOpen] = useState(false);
  const [scrolled, setScrolled] = useState(false);
  const [kategori, setKategori] = useState([]);
  const [openDropdown, setOpenDropdown] = useState(false);

  const dropdownRef = useRef(null);
  const { search, setSearch } = useSearch();
  const isLogin = false;

  /* SCROLL EFFECT */
  useEffect(() => {
    const onScroll = () => setScrolled(window.scrollY > 50);
    window.addEventListener("scroll", onScroll);
    return () => window.removeEventListener("scroll", onScroll);
  }, []);

  /* FETCH KATEGORI */
  useEffect(() => {
    fetch(`${API_URL}/api/kategori.php`)
      .then((res) => res.json())
      .then(setKategori);
  }, []);

  /* CLICK OUTSIDE → CLOSE */
  useEffect(() => {
    const close = (e) => {
      if (dropdownRef.current && !dropdownRef.current.contains(e.target)) {
        setOpenDropdown(false);
      }
    };
    document.addEventListener("mousedown", close);
    return () => document.removeEventListener("mousedown", close);
  }, []);

  const scrollTo = (id) => {
    setOpenDropdown(false);
    setMobileOpen(false);

    const el = document.getElementById(id);
    if (el) el.scrollIntoView({ behavior: "smooth" });
  };

  return (
    <header
      className={`fixed top-0 left-0 w-full z-[999] transition-all duration-300
        ${
          scrolled
            ? "bg-gradient-to-r from-blue-600/20 to-indigo-600/95 backdrop-blur shadow-lg"
            : "bg-transparent"
        }
      `}
    >
      <div className="max-w-7xl mx-auto px-4 h-16 flex items-center justify-between">
        {/* LOGO */}
        <div
          onClick={() => window.scrollTo({ top: 0, behavior: "smooth" })}
          className="flex items-center gap-3 cursor-pointer"
        >
          <img src={logo} alt="UNIGA" className="h-10 w-10" />
          <span className="text-lg font-bold text-white hidden sm:block">
            Universitas Gajayana
          </span>
        </div>

        {/* DESKTOP MENU */}
        <nav className="hidden md:flex items-center gap-8 font-semibold text-white">
          <button
            onClick={() =>
              window.scrollTo({
                top: 0,
                behavior: "smooth",
              })
            }
          >
            Home
          </button>

          {/* DROPDOWN CLICK */}
          <div ref={dropdownRef} className="relative">
            <button
              onClick={() => setOpenDropdown(!openDropdown)}
              className="flex items-center gap-1 hover:text-yellow-300"
            >
              Categories <ChevronDown size={16} />
            </button>

            {openDropdown && (
              <div
                className="absolute left-1/2 -translate-x-1/2 top-full mt-3
                bg-white text-gray-800 p-6 rounded-xl shadow-xl w-[520px]
                grid grid-cols-2 gap-6"
              >
                {kategori.map((k) => (
                  <div key={k.kategoriId}>
                    <h3
                      onClick={() => scrollTo(`kategori-${k.nama_kategori}`)}
                      className="font-semibold mb-2 text-blue-700 cursor-pointer hover:underline"
                    >
                      {k.nama_kategori}
                    </h3>

                    <ul className="space-y-1 text-sm">
                      {k.subkategori.map((s) => (
                        <li
                          key={s.id_subkategori}
                          onClick={() =>
                            scrollTo(
                              `sub-${k.nama_kategori}-${s.nama_subkategori}`
                            )
                          }
                          className="cursor-pointer hover:text-blue-600"
                        >
                          {s.nama_subkategori}
                        </li>
                      ))}
                    </ul>
                  </div>
                ))}
              </div>
            )}
          </div>

          <a href="#about" className="hover:text-yellow-300">
            About
          </a>
        </nav>

        {/* RIGHT */}
        <div className="hidden md:flex items-center gap-4">
          <div className="flex items-center bg-white/90 rounded-full px-3 py-1">
            <Search size={16} className="text-blue-600" />
            <input
              value={search}
              onChange={(e) => setSearch(e.target.value)}
              placeholder="Cari buku..."
              className="bg-transparent outline-none px-2 text-sm w-40 text-gray-800"
            />
          </div>

          {!isLogin && (
            <button
  onClick={() =>
    window.location.href =
      "http://localhost/library-react/back-end/login.php"
  }
  className="flex items-center gap-2 bg-yellow-400 text-black px-4 py-1.5 rounded-full font-bold"
>
  <User size={16} /> Login
</button>
          )}
        </div>

        {/* MOBILE BUTTON */}
        <button
          onClick={() => setMobileOpen(!mobileOpen)}
          className="md:hidden text-white"
        >
          {mobileOpen ? <X /> : <Menu />}
        </button>
      </div>
    </header>
  );
}

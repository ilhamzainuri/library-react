import { Search, X, ChevronLeft, ChevronRight } from "lucide-react";
import { useEffect, useRef, useState } from "react";
import { motion } from "framer-motion";
import ParticlesBg from "../assets/components/ParticlesBg";
import { useSearch } from "../assets/components/SearchContext";
import libraryBg from "../assets/images/perpus.jpg";
import aboutImg from "../assets/images/about-library.jpg";

const API_URL = "http://localhost/library-react/back-end";

/* ================= HOME ================= */

export default function Home() {
  const [books, setBooks] = useState([]);
  const { search, setSearch } = useSearch();
  const [loading, setLoading] = useState(true);
  const [selectedBook, setSelectedBook] = useState(null);

  useEffect(() => {
    fetch(`${API_URL}/api/buku.php`)
      .then((res) => res.json())
      .then(setBooks)
      .finally(() => setLoading(false));
  }, []);

  const filteredBooks = books.filter((b) =>
    `${b.judul} ${b.penulis} ${b.nama_kategori} ${b.nama_subkategori}`
      .toLowerCase()
      .includes(search.toLowerCase())
  );

  const groupedBooks = filteredBooks.reduce((acc, book) => {
    if (!acc[book.nama_kategori]) acc[book.nama_kategori] = {};
    if (!acc[book.nama_kategori][book.nama_subkategori]) {
      acc[book.nama_kategori][book.nama_subkategori] = [];
    }
    acc[book.nama_kategori][book.nama_subkategori].push(book);
    return acc;
  }, {});

  return (
    <main className="pt-[90px] bg-[#0b0f1a] min-h-screen text-gray-100 relative">
      <ParticlesBg />

      <Hero search={search} setSearch={setSearch} />

      <section className="relative z-10">
        <div className="max-w-7xl mx-auto px-6">
          {loading ? (
            <p className="text-center">Memuat data buku...</p>
          ) : (
            Object.entries(groupedBooks).map(([kategori, subcats]) => (
              <motion.div
                key={kategori}
                id={`kategori-${kategori}`}
                className="mb-20 scroll-mt-[90px]"
                initial={{ opacity: 0, y: 40 }}
                whileInView={{ opacity: 1, y: 0 }}
                viewport={{ once: true }}
                transition={{ duration: 0.6 }}
              >
                <h2 className="text-2xl font-bold mb-6">{kategori}</h2>

                {Object.entries(subcats).map(([sub, books]) => (
  <BookRow
    key={sub}
    id={`sub-${kategori}-${sub}`}
    title={sub}
    books={books}
    onOpen={setSelectedBook}
    isSearching={search.trim() !== ""}
  />
))}
              </motion.div>
            ))
          )}
        </div>
      </section>

      {/* ================= ABOUT SECTION ================= */}
      <section
        id="about"
        className="relative z-20 bg-gradient-to-b from-[#0b0f1a] to-[#0f172a] py-28 scroll-mt-[90px]"
      >
        <div className="max-w-7xl mx-auto px-6">
          {/* TITLE */}
          <motion.div
            initial={{ opacity: 0, y: 40 }}
            whileInView={{ opacity: 1, y: 0 }}
            viewport={{ once: true }}
            transition={{ duration: 0.7 }}
            className="text-center mb-20"
          >
            <h2 className="text-4xl md:text-5xl font-extrabold text-white mb-6">
              Tentang Perpustakaan UNIGA
            </h2>
            <p className="text-gray-400 max-w-3xl mx-auto leading-relaxed">
              Pusat sumber belajar modern yang mendukung kegiatan akademik,
              penelitian, dan pengembangan ilmu pengetahuan.
            </p>
          </motion.div>

          {/* CONTENT */}
          <div className="grid md:grid-cols-2 gap-14 items-center">
            {/* IMAGE */}
            <motion.div
              initial={{ opacity: 0, x: -40 }}
              whileInView={{ opacity: 1, x: 0 }}
              viewport={{ once: true }}
              transition={{ duration: 0.8 }}
              className="relative"
            >
              <img
                src={aboutImg}
                alt="Perpustakaan UNIGA"
                className="rounded-2xl shadow-2xl"
              />
              <div className="absolute inset-0 bg-blue-600/20 rounded-2xl blur-2xl -z-10" />
            </motion.div>

            {/* TEXT */}
            <motion.div
              initial={{ opacity: 0, x: 40 }}
              whileInView={{ opacity: 1, x: 0 }}
              viewport={{ once: true }}
              transition={{ duration: 0.8 }}
            >
              <h3 className="text-3xl font-bold text-white mb-6">
                Perpustakaan Digital & Fisik
              </h3>

              <p className="text-gray-300 leading-relaxed mb-6">
                Perpustakaan UNIGA menyediakan koleksi buku cetak dan digital
                dari berbagai bidang keilmuan seperti Soshum dan Saintek. Kami
                berkomitmen menjadi pusat literasi dan riset yang mudah diakses
                oleh mahasiswa dan dosen.
              </p>

              <div className="grid sm:grid-cols-2 gap-6">
                <Feature icon="📚" title="Koleksi Lengkap">
                  Ribuan buku dari berbagai disiplin ilmu.
                </Feature>
                <Feature icon="💻" title="Akses Digital">
                  Cari dan baca buku secara online.
                </Feature>
                <Feature icon="🎓" title="Akademik">
                  Mendukung riset dan pembelajaran.
                </Feature>
                <Feature icon="⚡" title="Cepat & Modern">
                  Antarmuka modern dan responsif.
                </Feature>
              </div>
            </motion.div>
          </div>
        </div>
      </section>

      {selectedBook && (
        <BookModal book={selectedBook} onClose={() => setSelectedBook(null)} />
      )}

      <Footer />
    </main>
  );
}

/* ================= NETFLIX ROW ================= */

function BookRow({ id, title, books, onOpen, isSearching }) {
  const rowRef = useRef(null);

  // 🔑 JIKA SEARCH → TIDAK DUPLIKASI
  const displayBooks = isSearching ? books : [...books, ...books, ...books];

  useEffect(() => {
    if (!rowRef.current || isSearching) return;

    // START DI TENGAH (HANYA JIKA BUKAN SEARCH)
    rowRef.current.scrollLeft = rowRef.current.scrollWidth / 3;
  }, [isSearching]);

  const handleScroll = () => {
    if (isSearching) return;

    const el = rowRef.current;
    const maxScroll = el.scrollWidth / 3;

    if (el.scrollLeft < maxScroll * 0.5) {
      el.scrollLeft += maxScroll;
    }
    if (el.scrollLeft > maxScroll * 1.5) {
      el.scrollLeft -= maxScroll;
    }
  };

  const scroll = (dir) => {
    rowRef.current.scrollBy({
      left: dir === "left" ? -300 : 300,
      behavior: "smooth",
    });
  };

  return (
    <div id={id} className="mb-14 relative scroll-mt-[90px]">
      <h3 className="text-lg font-semibold mb-4">{title}</h3>

      {!isSearching && (
        <>
          <button
            onClick={() => scroll("left")}
            className="absolute left-2 top-1/2 -translate-y-1/2 z-20 bg-black/60 p-3 rounded-full"
          >
            <ChevronLeft size={28} />
          </button>

          <button
            onClick={() => scroll("right")}
            className="absolute right-2 top-1/2 -translate-y-1/2 z-20 bg-black/60 p-3 rounded-full"
          >
            <ChevronRight size={28} />
          </button>
        </>
      )}

      <div
        ref={rowRef}
        onScroll={handleScroll}
        className="overflow-x-scroll scrollbar-hide"
      >
        <div className="flex gap-6 min-w-max h-[440px] px-14">
          {displayBooks.map((b, i) => (
            <BookCard
              key={isSearching ? b.bukuId : `${b.bukuId}-${i}`}
              book={b}
              onOpen={() => onOpen(b)}
            />
          ))}
        </div>
      </div>
    </div>
  );
}

/* ================= CARD ================= */

function BookCard({ book, onOpen }) {
  return (
    <motion.div
      initial={{ opacity: 0, y: 40 }}
      whileInView={{ opacity: 1, y: 0 }}
      viewport={{ once: true }}
      transition={{ duration: 0.4 }}
      whileHover={{ scale: 1.05 }}
      className="relative w-[240px] h-[360px] flex-shrink-0"
    >
      <div className="group relative w-full h-full rounded-2xl overflow-hidden bg-black shadow-xl">
        {/* COVER */}
        <img
          src={`http://localhost/library-react/back-end/uploads/${book.gambar}`}
          alt={book.judul}
          className="
            w-full
            h-full
            object-contain
            bg-[#0b0f1a]
            transition-transform
            duration-500
            group-hover:scale-110
          "
        />

        {/* OVERLAY INFO */}
        <div
          className="
            absolute inset-0
            bg-gradient-to-t
            from-black/90
            via-black/60
            to-transparent
            opacity-0
            group-hover:opacity-100
            transition
            flex
            flex-col
            justify-end
            p-4
          "
        >
          <span className="text-xs text-blue-400 mb-1 truncate">
            {book.nama_subkategori}
          </span>

          <h4 className="text-sm font-bold text-white line-clamp-2">
            {book.judul}
          </h4>

          <p className="text-xs text-gray-300 truncate mb-3">{book.penulis}</p>

          <button
            onClick={onOpen}
            className="
              bg-blue-600
              hover:bg-blue-500
              text-white
              text-sm
              py-2
              rounded-lg
              transition
            "
          >
            Lihat Detail
          </button>
        </div>
      </div>
    </motion.div>
  );
}

/* ================= MODAL ================= */

function BookModal({ book, onClose }) {
  return (
    <motion.div
      initial={{ opacity: 0 }}
      animate={{ opacity: 1 }}
      className="fixed inset-0 z-50 bg-black/80 flex items-center justify-center px-4"
    >
      <motion.div
        initial={{ scale: 0.9, y: 30 }}
        animate={{ scale: 1, y: 0 }}
        transition={{ duration: 0.3 }}
        className="bg-[#0f172a] text-gray-200 max-w-4xl w-full rounded-2xl overflow-hidden relative"
      >
        {/* CLOSE */}
        <button
          onClick={onClose}
          className="absolute top-4 right-4 text-gray-400 hover:text-red-400"
        >
          <X size={22} />
        </button>

        <div className="grid md:grid-cols-2 gap-6 p-6 max-h-[90vh] overflow-y-auto">
          {/* IMAGE */}
          <img
            src={`http://localhost/library-react/back-end/uploads/${book.gambar}`}
            alt={book.judul}
            className="w-full h-[420px] object-cover rounded-xl"
          />

          {/* INFO */}
          <div className="flex flex-col">
            <h3 className="text-2xl font-bold text-white mb-2">{book.judul}</h3>

            <p className="text-gray-400 mb-4">{book.penulis}</p>

            <div className="grid grid-cols-2 gap-3 text-sm mb-6">
              <p>
                <b>Kategori:</b> {book.nama_kategori}
              </p>
              <p>
                <b>Sub:</b> {book.nama_subkategori}
              </p>
              <p>
                <b>Penerbit:</b> {book.penerbit}
              </p>
              <p>
                <b>Tahun:</b> {book.tahun_terbit}
              </p>
              <p>
                <b>eISBN:</b> {book.eISBN || "-"}
              </p>
              <p>
                <b>Rak:</b> {book.nomor_rak}
              </p>
            </div>

            <div className="mt-auto">
              <button
                onClick={onClose}
                className="w-full bg-blue-600 hover:bg-blue-500 text-white py-2 rounded-lg"
              >
                Tutup
              </button>
            </div>
          </div>

          {/* SINOPSIS */}
          <div className="md:col-span-2">
            <h4 className="font-bold text-white mb-2">Sinopsis</h4>
            <p className="text-sm text-gray-300 leading-relaxed whitespace-pre-line">
              {book.sinopsis || "Sinopsis belum tersedia."}
            </p>
          </div>
        </div>
      </motion.div>
    </motion.div>
  );
}

/* ================= HERO ================= */

function Hero({ search, setSearch }) {
  return (
    <section className="relative overflow-hidden text-white">
      <div
        className="absolute inset-0 bg-cover bg-center scale-110"
        style={{ backgroundImage: `url(${libraryBg})` }}
      />
      <div className="absolute inset-0 bg-black/75" />
      <ParticlesBg />

      <motion.div
        initial={{ opacity: 0, y: 40 }}
        animate={{ opacity: 1, y: 0 }}
        transition={{ duration: 0.8 }}
        className="relative z-10 max-w-7xl mx-auto px-6 py-24 text-center"
      >
        <h1 className="text-5xl font-extrabold mb-6">Perpustakaan UNIGA</h1>
        <p className="text-gray-300 mb-8">
          Jelajahi koleksi buku digital dan fisik
        </p>

        <div className="max-w-xl mx-auto flex items-center bg-white rounded-full px-4 py-3 shadow-xl">
          <Search className="text-gray-500" />
          <input
            value={search}
            onChange={(e) => setSearch(e.target.value)}
            placeholder="Cari buku..."
            className="flex-1 px-3 outline-none text-gray-700 bg-transparent"
          />
        </div>
      </motion.div>
    </section>
  );
}

/* ================= FEATURE ================= */
function Feature({ icon, title, children }) {
  return (
    <div className="bg-white/5 backdrop-blur-lg rounded-xl p-6 hover:bg-white/10 transition">
      <div className="text-3xl mb-3">{icon}</div>
      <h4 className="text-lg font-bold text-white mb-2">{title}</h4>
      <p className="text-sm text-gray-400 leading-relaxed">{children}</p>
    </div>
  );
}

function Footer() {
  return (
    <footer className="bg-gray-900 text-gray-300 py-6 text-center">
      © {new Date().getFullYear()} Perpustakaan UNIGA
    </footer>
  );
}

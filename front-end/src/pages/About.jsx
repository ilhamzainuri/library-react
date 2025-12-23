import { motion } from "framer-motion";
import ParticlesBg from "../assets/components/ParticlesBg";
import libraryBg from "../assets/images/perpus.jpg";
import { BookOpen, Users, GraduationCap, Library } from "lucide-react";

export default function About() {
  return (
    <main className="pt-[90px] bg-[#0b0f1a] min-h-screen text-gray-100 relative">
      <ParticlesBg />

      {/* ================= HERO ================= */}
      <section className="relative overflow-hidden">
        <div
          className="absolute inset-0 bg-cover bg-center scale-110"
          style={{ backgroundImage: `url(${libraryBg})` }}
        />
        <div className="absolute inset-0 bg-black/75" />

        <motion.div
          initial={{ opacity: 0, y: 40 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.8 }}
          className="relative z-10 max-w-6xl mx-auto px-6 py-28 text-center"
        >
          <h1 className="text-5xl font-extrabold mb-6">
            Tentang Perpustakaan UNIGA
          </h1>
          <p className="text-gray-300 text-lg max-w-3xl mx-auto">
            Pusat sumber informasi dan literasi akademik Universitas Garut
            untuk mendukung pendidikan, penelitian, dan pengabdian masyarakat.
          </p>
        </motion.div>
      </section>

      {/* ================= VISI & MISI ================= */}
      <section className="relative z-10 py-24">
        <div className="max-w-6xl mx-auto px-6 grid md:grid-cols-2 gap-12">
          <motion.div
            initial={{ opacity: 0, x: -40 }}
            whileInView={{ opacity: 1, x: 0 }}
            viewport={{ once: true }}
            transition={{ duration: 0.6 }}
            className="bg-[#0f172a] rounded-2xl p-8 shadow-xl"
          >
            <h2 className="text-2xl font-bold mb-4 text-blue-400">Visi</h2>
            <p className="text-gray-300 leading-relaxed">
              Menjadi perpustakaan perguruan tinggi yang unggul dalam penyediaan
              layanan informasi berbasis teknologi untuk mendukung civitas
              akademika Universitas Garut.
            </p>
          </motion.div>

          <motion.div
            initial={{ opacity: 0, x: 40 }}
            whileInView={{ opacity: 1, x: 0 }}
            viewport={{ once: true }}
            transition={{ duration: 0.6 }}
            className="bg-[#0f172a] rounded-2xl p-8 shadow-xl"
          >
            <h2 className="text-2xl font-bold mb-4 text-blue-400">Misi</h2>
            <ul className="space-y-3 text-gray-300 list-disc list-inside">
              <li>Menyediakan koleksi buku cetak dan digital</li>
              <li>Mendukung pendidikan, penelitian, dan literasi</li>
              <li>Mengembangkan layanan perpustakaan berbasis digital</li>
              <li>Meningkatkan budaya membaca di lingkungan kampus</li>
            </ul>
          </motion.div>
        </div>
      </section>

      {/* ================= STATISTIK ================= */}
      <section className="relative z-10 pb-24">
        <div className="max-w-6xl mx-auto px-6">
          <motion.h2
            initial={{ opacity: 0, y: 30 }}
            whileInView={{ opacity: 1, y: 0 }}
            viewport={{ once: true }}
            transition={{ duration: 0.6 }}
            className="text-3xl font-bold text-center mb-12"
          >
            Perpustakaan dalam Angka
          </motion.h2>

          <div className="grid sm:grid-cols-2 md:grid-cols-4 gap-8">
            <StatCard icon={<BookOpen />} title="10.000+" desc="Koleksi Buku" />
            <StatCard icon={<Users />} title="5.000+" desc="Pengguna Aktif" />
            <StatCard icon={<GraduationCap />} title="6" desc="Fakultas" />
            <StatCard icon={<Library />} title="2" desc="Layanan (Digital & Fisik)" />
          </div>
        </div>
      </section>

      <footer className="bg-gray-900 text-gray-300 py-6 text-center">
        © {new Date().getFullYear()} Perpustakaan UNIGA
      </footer>
    </main>
  );
}

/* ================= STAT CARD ================= */

function StatCard({ icon, title, desc }) {
  return (
    <motion.div
      initial={{ opacity: 0, y: 40 }}
      whileInView={{ opacity: 1, y: 0 }}
      viewport={{ once: true }}
      transition={{ duration: 0.5 }}
      className="bg-[#0f172a] rounded-2xl p-6 text-center shadow-xl hover:scale-105 transition"
    >
      <div className="flex justify-center mb-4 text-blue-400">
        {icon}
      </div>
      <h3 className="text-2xl font-bold mb-1">{title}</h3>
      <p className="text-gray-400">{desc}</p>
    </motion.div>
  );
}

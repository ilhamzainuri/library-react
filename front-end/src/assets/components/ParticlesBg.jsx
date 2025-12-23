import { useCallback } from "react";
import Particles from "react-tsparticles";
import { loadSlim } from "tsparticles-slim";

export default function ParticlesBg() {
  const particlesInit = useCallback(async (engine) => {
    await loadSlim(engine);
  }, []);

  return (
    <Particles
      init={particlesInit}
      className="fixed inset-0 z-[1] pointer-events-none"
      options={{
        fullScreen: false,
        background: {
          color: "transparent",
        },
        particles: {
          number: {
            value: 80,
            density: {
              enable: true,
              area: 1000,
            },
          },
          color: {
            value: "#ffffff",
          },
          opacity: {
            value: 0.3,
          },
          size: {
            value: { min: 1, max: 3 },
          },
          move: {
            enable: true,
            speed: 0.4,
          },
          links: {
            enable: true,
            distance: 140,
            color: "#ffffff",
            opacity: 0.15,
            width: 1,
          },
        },
        detectRetina: true,
      }}
    />
  );
}

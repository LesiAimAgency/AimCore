/**
 * =============================================================================
 * [INBETWEEN] LANDING PAGE — MASTER ANIMATION & INTERACTION ENGINE
 * Powered by GSAP 3 + ScrollTrigger
 * =============================================================================
 */

// Global Toggle Function for Section 6 Story Cards (Ultra-Smooth CSS Grid Accordion)
window.toggleStoryCard = function (trigger) {
  if (!trigger) return;
  const card = trigger.closest(".story-card");
  if (!card) return;

  const isOpen = card.classList.contains("is-open");
  card.classList.toggle("is-open", !isOpen);

  const btn = card.querySelector(".story-toggle-btn");
  if (btn) {
    btn.setAttribute("aria-expanded", String(!isOpen));
  }

  // Refresh ScrollTrigger after smooth CSS transition completes
  setTimeout(() => {
    if (typeof ScrollTrigger !== "undefined") {
      ScrollTrigger.refresh();
    }
  }, 450);
};

// Delegated click listener on document for maximum reliability
document.addEventListener("click", (e) => {
  const toggleBtn = e.target.closest(".story-toggle-bar");
  if (toggleBtn) {
    if (!toggleBtn.hasAttribute("onclick")) {
      window.toggleStoryCard(toggleBtn);
    }
  }
});

document.addEventListener("DOMContentLoaded", () => {

  // ===========================================================================
  // 1. SLIDE-OUT DRAWER MODAL CONTROLLER (SUBMIT FORM.svg)
  // ===========================================================================
  const drawer = document.getElementById("contact-drawer");
  const overlay = document.getElementById("contact-drawer-overlay");
  const closeBtn = document.getElementById("close-drawer-btn");

  window.openDrawer = function () {
    if (drawer && overlay) {
      overlay.classList.remove("hidden");
      document.body.style.overflow = "hidden"; // Lock background scroll
      requestAnimationFrame(() => {
        overlay.classList.remove("opacity-0");
        drawer.classList.remove("translate-x-full");
      });
    }
  };

  window.closeDrawer = function () {
    if (drawer && overlay) {
      overlay.classList.add("opacity-0");
      drawer.classList.add("translate-x-full");
      document.body.style.overflow = ""; // Unlock scroll
      setTimeout(() => {
        overlay.classList.add("hidden");
      }, 300);
    }
  };

  if (closeBtn) closeBtn.addEventListener("click", window.closeDrawer);
  if (overlay) overlay.addEventListener("click", window.closeDrawer);

  // Close drawer on ESC key
  window.addEventListener("keydown", (e) => {
    if (e.key === "Escape") window.closeDrawer();
  });

  // Bind all triggers (LET'S CONNECT, JOIN US, BE OUR GUEST, BECOME A MEMBER)
  document.querySelectorAll('a[href="#contact"]').forEach((el) => {
    el.addEventListener("click", (e) => {
      e.preventDefault();
      window.openDrawer();
    });
  });

  // ===========================================================================
  // 2. SMOOTH NATIVE & ANCHOR NAVIGATION
  // ===========================================================================
  document.querySelectorAll('a[href^="#"]').forEach((link) => {
    link.addEventListener("click", (e) => {
      const targetId = link.getAttribute("href");
      if (!targetId || targetId === "#" || targetId === "#contact") return;

      const target = document.querySelector(targetId);
      if (target) {
        e.preventDefault();
        target.scrollIntoView({ behavior: "smooth", block: "start" });
      }
    });
  });

  // Mobile menu toggle
  const menuBtn = document.getElementById("mobile-menu-btn");
  const mobileMenu = document.getElementById("mobile-menu");
  if (menuBtn && mobileMenu) {
    menuBtn.addEventListener("click", () => {
      mobileMenu.classList.toggle("hidden");
    });
  }

  // ===========================================================================
  // 2.1 DYNAMIC ADAPTIVE HEADER (Light / Dark Section Detection)
  // ===========================================================================
  const siteHeader = document.getElementById("site-header");
  const lightSections = document.querySelectorAll("#about, #media, #packages, #contact, .bg-\\[\\#F9F9F9\\]");

  if (siteHeader) {
    const updateHeaderTheme = () => {
      const scrollY = window.scrollY || window.pageYOffset;
      const headerHeight = siteHeader.offsetHeight || 70;
      const headerCenterY = scrollY + headerHeight / 2;

      // Scrolled backdrop effect
      if (scrollY > 30) {
        siteHeader.classList.add("header-scrolled");
      } else {
        siteHeader.classList.remove("header-scrolled");
      }

      // Check if header is currently intersecting any light section
      let isOverLight = false;
      lightSections.forEach((sec) => {
        const top = sec.offsetTop;
        const bottom = top + sec.offsetHeight;
        if (headerCenterY >= top && headerCenterY < bottom) {
          isOverLight = true;
        }
      });

      if (isOverLight) {
        siteHeader.classList.add("header-light");
      } else {
        siteHeader.classList.remove("header-light");
      }
    };

    window.addEventListener("scroll", updateHeaderTheme, { passive: true });
    window.addEventListener("resize", updateHeaderTheme, { passive: true });
    updateHeaderTheme();
  }

  // ===========================================================================
  // 3. GSAP & SCROLLTRIGGER ANIMATION SUITE
  // ===========================================================================
  const ENABLE_ANIMATIONS = true;

  // Ensure autoplay on all background media / videos
  document.querySelectorAll("video").forEach((vid) => {
    vid.muted = true;
    vid.playsInline = true;
    const playPromise = vid.play();
    if (playPromise !== undefined) playPromise.catch(() => { });
  });

  if (!ENABLE_ANIMATIONS) {
    console.log("[INBETWEEN] Animations are disabled.");
    return;
  }

  if (typeof gsap === "undefined" || typeof ScrollTrigger === "undefined") {
    console.warn("GSAP or ScrollTrigger not loaded.");
    return;
  }

  gsap.registerPlugin(ScrollTrigger);

  // ---------------------------------------------------------------------------
  // SECTION 0: HERO ENTRANCE
  // ---------------------------------------------------------------------------
  const heroSection = document.getElementById("hero");
  if (heroSection) {
    const heroTL = gsap.timeline({ defaults: { ease: "power3.out" } });

    heroTL.from(".hero-logo-wrapper", {
      y: 50,
      opacity: 0,
      duration: 1.2,
      scale: 0.95
    }, 0.2);

    heroTL.from(".hero-subtitle p", {
      y: 35,
      opacity: 0,
      stagger: 0.18,
      duration: 1.0
    }, 0.5);

    gsap.to(".hero-content", {
      y: -8,
      duration: 3,
      repeat: -1,
      yoyo: true,
      ease: "sine.inOut"
    });
  }

  // ===========================================================================
  // SECTION 1 (#community-wall) & SECTION 2 (#community) SCROLL INTERACTIONS
  // ===========================================================================
  const mm = gsap.matchMedia();

  // Desktop Composition (min-width: 1024px)
  mm.add("(min-width: 1024px)", () => {
    const wallCards = gsap.utils.toArray("#community-wall .floating-card");
    const centerLogo = document.getElementById("wall-center-logo");
    const pinnedWrapper = document.getElementById("community-pinned-wrapper");

    // SECTION 1 & 2 COMBINED: Onepage transition inside pinned wrapper
    if (pinnedWrapper) {
      // Sort wallCards into layers (front to back based on visual depth)
      // This creates the "layer by layer" fade requested by the user
      const layer1 = wallCards.slice(0, 3);
      const layer2 = wallCards.slice(3, 7);
      const layer3 = wallCards.slice(7, 10);

      const commTL = gsap.timeline({
        scrollTrigger: {
          trigger: "#community-pinned-wrapper",
          start: "top top",
          end: "+=250%", // Extended scrolling distance for both sections
          pin: true,
          scrub: 1,
          anticipatePin: 1,
          invalidateOnRefresh: true,
        }
      });

      // Initial state for Stage 2 (Community)
      gsap.set(["#sec2-title-top", "#sec2-title-bot", "#sec2-subtitle", "#sec2-ctas", "#sec2-card-1", "#sec2-card-3", "#sec2-card-2", "#sec2-card-4"], {
        opacity: 0
      });
      gsap.set("#community", { opacity: 1 });

      // PART 1: Drift & Fade out Community Wall layers sequentially
      commTL.to(layer1, { y: -80, scale: 0.9, opacity: 0, duration: 0.4, ease: "power2.inOut" }, 0)
        .to(layer2, { y: -60, scale: 0.95, opacity: 0, duration: 0.4, ease: "power2.inOut" }, 0.2)
        .to(layer3, { y: -40, scale: 1, opacity: 0, duration: 0.4, ease: "power2.inOut" }, 0.4);

      if (centerLogo) {
        // Shrink the original logo to fit the next section without fading it out
        commTL.to(centerLogo, { scale: 340 / 548, duration: 0.4, ease: "power2.inOut" }, 0.7);
      }

      // Do not fade out #community-wall so centerLogo remains visible

      // PART 2: Fade in Community Statement & 4 Pillars
      // 1. Center statement reveals
      commTL.fromTo("#sec2-title-top",
        { opacity: 0, y: -20 },
        { opacity: 1, y: 0, duration: 0.4, ease: "power2.out" },
        0.7
      );
      commTL.fromTo("#sec2-title-bot",
        { opacity: 0, y: 20 },
        { opacity: 1, y: 0, duration: 0.4, ease: "power2.out" },
        0.8
      );
      commTL.fromTo(["#sec2-subtitle", "#sec2-ctas"],
        { opacity: 0, y: 15 },
        { opacity: 1, y: 0, stagger: 0.1, duration: 0.4, ease: "power2.out" },
        0.9
      );

      // 2. 4 Cards reveal sequentially
      commTL.fromTo("#sec2-card-1",
        { opacity: 0, y: 40, scale: 0.94 },
        { opacity: 1, y: 0, scale: 1.0, duration: 0.25, ease: "power2.out" },
        1.0
      );
      commTL.fromTo("#sec2-card-3",
        { opacity: 0, y: 40, scale: 0.94 },
        { opacity: 1, y: 0, scale: 1.0, duration: 0.25, ease: "power2.out" },
        1.15
      );
      commTL.fromTo("#sec2-card-2",
        { opacity: 0, y: 40, scale: 0.94 },
        { opacity: 1, y: 0, scale: 1.0, duration: 0.25, ease: "power2.out" },
        1.3
      );
      commTL.fromTo("#sec2-card-4",
        { opacity: 0, y: 40, scale: 0.94 },
        { opacity: 1, y: 0, scale: 1.0, duration: 0.25, ease: "power2.out" },
        1.45
      );

      // Hold fully built composition before unpinning cleanly
      commTL.to({}, { duration: 0.4 });
    }
  });

  // Mobile & Tablet Composition (max-width: 1023px)
  mm.add("(max-width: 1023px)", () => {
    // Mobile & Tablet Composition: Simplified scroll reveal
    const pinnedWrapper = document.getElementById("community-pinned-wrapper");
    if (pinnedWrapper) {
      const wallTLMobile = gsap.timeline({
        scrollTrigger: {
          trigger: "#community-pinned-wrapper",
          start: "top top",
          end: "+=150%",
          scrub: 0.8,
          pin: true
        }
      });

      // Show community immediately for mobile, just stacked
      gsap.set("#community", { opacity: 1 });

      wallCards.forEach((card, i) => {
        wallTLMobile.to(card, {
          y: (i % 2 === 0 ? -30 : 30),
          opacity: 0,
          duration: 0.6
        }, 0);
      });

      if (centerLogo) {
        wallTLMobile.to(centerLogo, { scale: 340 / 548, duration: 0.6 }, 0.2);
      }
      // Do not fade out #community-wall so logo remains visible

      wallTLMobile.fromTo(["#sec2-title-top", "#sec2-title-bot", "#sec2-subtitle", "#sec2-ctas"],
        { opacity: 0, y: 25 },
        { opacity: 1, y: 0, stagger: 0.08, duration: 0.6, ease: "power2.out" }, 0.8
      );

      const cards = ["#sec2-card-1", "#sec2-card-3", "#sec2-card-2", "#sec2-card-4"];
      cards.forEach((cardId, i) => {
        wallTLMobile.fromTo(cardId,
          { opacity: 0, y: 30, scale: 0.96 },
          { opacity: 1, y: 0, scale: 1.0, duration: 0.6, ease: "power2.out" }, 1.2 + (i * 0.1)
        );
      });
    }
  });

  // Reduced Motion Support
  mm.add("(prefers-reduced-motion: reduce)", () => {
    gsap.set(["#wall-center-logo", "#community-wall .floating-card", "#sec2-card-1", "#sec2-card-2", "#sec2-card-3", "#sec2-card-4", "#sec2-title-top", "#sec2-title-bot", "#sec2-subtitle", "#sec2-ctas"], {
      clearProps: "all",
      opacity: 1,
      visibility: "visible",
      transform: "none",
      filter: "none"
    });
  });

  // ---------------------------------------------------------------------------
  // SECTION 3: CORE VALUES (3 VÒNG TRÒN CHỤM GIỮA BAY RA 2 BÊN)
  // ---------------------------------------------------------------------------
  const aboutSec = document.getElementById("about");
  if (aboutSec) {
    const vennTL = gsap.timeline({
      scrollTrigger: {
        trigger: "#about",
        start: "top 75%",
        toggleActions: "play none none none"
      }
    });

    // Header reveal
    vennTL.fromTo("#core-values-header",
      { opacity: 0, y: 35 },
      { opacity: 1, y: 0, duration: 0.8, ease: "power2.out" },
      0
    );

    // 3 Vòng tròn bắt đầu từ CHỤM Ở TRUNG TÂM rồi BAY RA 3 VỊ TRÍ
    vennTL.fromTo(".venn-item-1",
      { x: 378, scale: 0.6, opacity: 0.3 },
      { x: 0, scale: 1.0, opacity: 1.0, duration: 1.1, ease: "power3.out" },
      0.15
    );

    vennTL.fromTo(".venn-item-2",
      { scale: 0.6, opacity: 0.3 },
      { scale: 1.0, opacity: 1.0, duration: 1.1, ease: "power3.out" },
      0.15
    );

    vennTL.fromTo(".venn-item-3",
      { x: -378, scale: 0.6, opacity: 0.3 },
      { x: 0, scale: 1.0, opacity: 1.0, duration: 1.1, ease: "power3.out" },
      0.15
    );

    // 2 Dấu cộng trắng + xoay và bung nở tại giao điểm
    vennTL.fromTo(".venn-plus-sign",
      { scale: 0, rotation: -180, opacity: 0 },
      { scale: 1.0, rotation: 0, opacity: 1.0, stagger: 0.12, duration: 0.7, ease: "back.out(1.8)" },
      0.7
    );

    // Continuous 4s scale X/Y effect for the Plus signs after they appear
    gsap.to(".venn-plus-sign", {
      scaleX: 1.25,
      scaleY: 1.25,
      duration: 2, // 2s up + 2s down = 4s cycle
      yoyo: true,
      repeat: -1,
      ease: "sine.inOut",
      delay: 1.4 // Wait for entrance animation to finish
    });

    // Nội dung chữ bên trong 3 vòng tròn fade in
    vennTL.fromTo(".venn-item h3, .venn-item p",
      { opacity: 0, y: 15 },
      { opacity: 1, y: 0, stagger: 0.08, duration: 0.5, ease: "power2.out" },
      0.8
    );
  }

  // ---------------------------------------------------------------------------
  // SECTION 4: FOUNDER & MISSION
  // ---------------------------------------------------------------------------
  const founderSec = document.getElementById("founder");
  if (founderSec) {
    const founderTL = gsap.timeline({
      scrollTrigger: {
        trigger: "#founder",
        start: "top 75%",
        toggleActions: "play none none none"
      }
    });

    founderTL.fromTo("#founder-title-block",
      { opacity: 0, x: -40 },
      { opacity: 1, x: 0, duration: 0.8, ease: "power2.out" },
      0
    );

    const badges = ["#founder-badge-yt", "#founder-badge-fb", "#founder-badge-ig"];
    founderTL.fromTo(badges,
      { opacity: 0, scale: 0.7, y: 25 },
      { opacity: 1, scale: 1.0, y: 0, stagger: 0.15, duration: 0.7, ease: "back.out(1.4)" },
      0.2
    );
    // Social badges remain static (no bobbing animation)

    // Text scrub reveal effect for the mission slogan words (Opacity Scrub)
    gsap.fromTo(".mission-word",
      { opacity: 0.15 },
      {
        opacity: 1,
        stagger: 0.2,
        ease: "none",
        scrollTrigger: {
          trigger: "#founder",
          start: "top top", // Starts when section hits top of viewport
          end: "+=150%", // Pins for 150% of viewport height
          pin: true,
          scrub: 1
        }
      }
    );
  }

  // ---------------------------------------------------------------------------
  // SECTION 5: UPCOMING EVENTS & VIP INVITATION
  // ---------------------------------------------------------------------------
  const eventsSec = document.getElementById("events");
  if (eventsSec) {
    const eventsTL = gsap.timeline({
      scrollTrigger: {
        trigger: "#events",
        start: "top 75%",
        toggleActions: "play none none none"
      }
    });

    eventsTL.fromTo("#events-header",
      { opacity: 0, y: -25 },
      { opacity: 1, y: 0, duration: 0.7, ease: "power2.out" },
      0
    );

    eventsTL.fromTo("#vip-invitation-box > *",
      { opacity: 0, y: 30 },
      { opacity: 1, y: 0, stagger: 0.1, duration: 0.7, ease: "power2.out" },
      0.15
    );
  }

  // ---------------------------------------------------------------------------
  // SECTION 6: STORIES
  // ---------------------------------------------------------------------------
  const mediaSec = document.getElementById("media") || document.getElementById("stories");
  if (mediaSec) {
    const storiesTL = gsap.timeline({
      scrollTrigger: {
        trigger: mediaSec,
        start: "top 75%",
        toggleActions: "play none none none"
      }
    });

    storiesTL.fromTo("#stories-header",
      { opacity: 0, y: 35 },
      { opacity: 1, y: 0, duration: 0.8, ease: "power2.out" },
      0
    );

    const storyCards = mediaSec.querySelectorAll("article");
    storiesTL.fromTo(storyCards,
      { opacity: 0 },
      { opacity: 1, stagger: 0.12, duration: 0.8, ease: "power2.out" },
      0.2
    );
  }

  // ---------------------------------------------------------------------------
  // SECTION 7: MEMBERSHIP PACKAGES (STICKY / FIXED HEADER ON SCROLL)
  // ---------------------------------------------------------------------------
  const packagesSec = document.getElementById("packages") || document.getElementById("membership");
  const stickyHeader = document.getElementById("packages-sticky-header");
  if (packagesSec && stickyHeader) {
    const packageCards = packagesSec.querySelectorAll(".package-card");

    // Reveal header and cards initially
    gsap.fromTo(stickyHeader,
      { opacity: 0, x: -30 },
      {
        opacity: 1,
        x: 0,
        duration: 0.8,
        ease: "power2.out",
        scrollTrigger: {
          trigger: packagesSec,
          start: "top 85%",
          toggleActions: "play none none none"
        }
      }
    );

    gsap.fromTo(packageCards,
      { opacity: 0, y: 40 },
      {
        opacity: 1,
        y: 0,
        stagger: 0.15,
        duration: 0.8,
        ease: "power2.out",
        scrollTrigger: {
          trigger: packagesSec,
          start: "top 85%",
          toggleActions: "play none none none"
        }
      }
    );

    // Desktop Pinning: Left column stays fixed/pinned while right column scrolls past
    ScrollTrigger.matchMedia({
      "(min-width: 1024px)": function () {
        ScrollTrigger.create({
          trigger: packagesSec,
          start: "top top+=100",
          end: "bottom bottom-=60",
          pin: stickyHeader,
          pinSpacing: false,
          invalidateOnRefresh: true,
        });
      }
    });
  }

  // ---------------------------------------------------------------------------
  // SECTION 8: ONE NETWORK ENDLESS POSSIBILITIES & FOOTER
  // ---------------------------------------------------------------------------
  const footerSec = document.getElementById("footer") || document.querySelector("footer");
  if (footerSec) {
    const footerTL = gsap.timeline({
      scrollTrigger: {
        trigger: footerSec,
        start: "top 80%",
        toggleActions: "play none none none"
      }
    });

    footerTL.fromTo("#brand-statement-banner .font-black > div",
      { opacity: 0, y: 45 },
      { opacity: 1, y: 0, stagger: 0.15, duration: 0.9, ease: "power2.out" },
      0
    );

    footerTL.fromTo("#brand-statement-banner p",
      { opacity: 0, y: 25 },
      { opacity: 1, y: 0, duration: 0.7, ease: "power2.out" },
      0.3
    );

    footerTL.fromTo("#footer-grid > div",
      { opacity: 0, y: 25 },
      { opacity: 1, y: 0, stagger: 0.08, duration: 0.6, ease: "power2.out" },
      0.4
    );
  }

  // Refresh ScrollTrigger once everything is loaded
  window.addEventListener("load", () => {
    ScrollTrigger.refresh();
  });

});

# 📜 HƯỚNG DẪN & QUY TẮC TRIỂN KHAI GSAP SCROLLTRIGGER (TRIONN STYLE)

Tài liệu này tổng hợp toàn bộ kiến thức, kiến trúc kỹ thuật và **bộ quy tắc chuẩn (Rules)** để xây dựng các hiệu ứng cuộn trang cao cấp (Scroll-driven Animations, Pin-Spacer, Shutter Slat Curtain) theo tiêu chuẩn các studio hàng đầu thế giới như **TRIONN / Awwwards**.

---

## 📌 1. TỔNG QUAN VỀ GSAP & SCROLLTRIGGER

### 1.1 GSAP là gì?
* **GSAP (GreenSock Animation Platform)** là thư viện JavaScript tiêu chuẩn số 1 thế giới chuyên về xử lý chuyển động trên Web.
* **ScrollTrigger** là plugin mở rộng của GSAP, có nhiệm vụ gắn chặt chuyển động của các phần tử HTML vào tiến trình cuộn chuột của người dùng (**Scrubbing**).

### 1.2 Thẻ `<div class="pin-spacer">` hoạt động như thế nào?
* Khi ta khai báo thuộc tính `pin: true` trong `ScrollTrigger`, GSAP sẽ **tự động bọc** section mục tiêu bằng một thẻ `<div class="pin-spacer">`.
* Thẻ `pin-spacer` này tự động tính toán chiều cao đệm (ví dụ: `padding-bottom: 1200px`) để tạo ra một "quãng đường cuộn ảo".
* Trong suốt quãng đường đó, section bên trong được khóa cứng tại chỗ (`position: fixed` / `transform: translate`), cho phép chạy toàn bộ animation theo thanh cuộn trước khi nhả ra để cuộn tiếp xuống dưới.

---

## 🎬 2. KỸ THUẬT HIỆU ỨNG KÉO RÈM TRIONN (SHUTTER SLAT CURTAIN)

### Bản chất kỹ thuật:
Thay vì thay đổi thuộc tính `height` hay `top` (rất tốn CPU và dễ giật lag), TRIONN dùng kỹ thuật **5 thanh ngang co giãn GPU (`transform: scaleY`)**:

1. **Lớp phủ 5 thanh ngang**:
   * Chiều cao mỗi thanh chiếm đúng `20%` màn hình (`height: 20%` hoặc `flex: 1`).
   * Gốc co giãn được cố định ở đáy: `transform-origin: bottom center`.
   * Trạng thái khởi tạo: `transform: scaleY(0)` (chiều cao hiển thị = 0).
2. **Kích hoạt Scrubbing theo thứ tự từ dưới lên**:
   * `Thanh 4` (ở đáy) giãn từ `scaleY: 0 → 1` đầu tiên.
   * `Thanh 3` giãn tiếp theo.
   * `Thanh 2` giãn tiếp theo.
   * `Thanh 1` giãn tiếp theo.
   * `Thanh 0` (ở đỉnh) giãn cuối cùng.
3. Khi cả 5 thanh cùng đạt `scaleY: 1`, toàn bộ ghép khít thành một tấm rèm xám sáng phẳng 100% che kín màn hình, đồng thời mở khóa hiển thị **Section mới**.

---

## 🛡️ 3. BỘ QUY TẮC BẮT BUỘC KHI TRIỂN KHAI (RULES)

> [!IMPORTANT]
> Hãy luôn tuân thủ 5 quy tắc dưới đây khi áp dụng GSAP ScrollTrigger vào bất kỳ dự án web nào:

### 🔴 Quy tắc 1: Tuyệt đối không can thiệp ghi đè CSS lên `.pin-spacer`
* GSAP tự động quản lý kích thước và vị trí của thẻ `.pin-spacer`.
* **KHÔNG** đặt `margin`, `padding`, hoặc `position: relative !important` lên thẻ này bằng CSS ngoài, tránh làm lệch toạ độ tính toán của ScrollTrigger.

### 🔴 Quy tắc 2: Luôn tối ưu hiệu năng bằng GPU Transforms
* **CHỈ** animate các thuộc tính được GPU tăng tốc: `transform` (`translate3d`, `scale`, `scaleY`, `rotate`) và `opacity`.
* **TRÁNH** animate trực tiếp: `top`, `bottom`, `left`, `width`, `height`, `margin`, `padding`.

### 🔴 Quy tắc 3: Tích hợp Smooth Scroll (Lenis) đúng chuẩn
* Phải đồng bộ hóa `requestAnimationFrame` giữa Lenis và GSAP Ticker để tránh hiện tượng giật rung (jittering) khi cuộn chuột:
```javascript
lenis.on('scroll', ScrollTrigger.update);
gsap.ticker.add((time) => {
    lenis.raf(time * 1000);
});
gsap.ticker.lagSmoothing(0);
```

### 🔴 Quy tắc 4: Cân đối quãng đường cuộn (`end`) và độ bám (`scrub`)
* **Quãng đường cuộn ảo (`end`)**: Nên để từ `+=1000` đến `+=1500` px. Quá dài sẽ làm người dùng mỏi tay, quá ngắn sẽ làm chuyển động bị lướt qua quá nhanh.
* **Độ trễ (`scrub`)**: Khuyên dùng từ `0.3` đến `0.6` giây để tạo cảm giác mượt mà nhưng vẫn phản hồi tức thì.

### 🔴 Quy tắc 5: Tự động cập nhật khi đổi kích thước màn hình (Resize)
* Khi thay đổi kích thước cửa sổ hoặc load xong ảnh lớn, cần gọi `ScrollTrigger.refresh()` để tính toán lại điểm bắt đầu và kết thúc chuẩn xác.

---

## 💻 4. CODE MẪU CHUẨN ĐỂ SỬ DỤNG (BOILERPLATE)

### 4.1 Cấu trúc HTML & CSS:
```html
<!-- Pinned Hero Section -->
<section id="hero-pinned-section" class="relative w-full h-screen overflow-hidden bg-[#08080a]">
    
    <!-- Layer 1: Dark Content -->
    <div class="absolute inset-0 z-10 flex items-center justify-center">
        <h1 class="text-white text-7xl font-bold">SECTION 01</h1>
    </div>

    <!-- Layer 2: 5 Slats Overlay -->
    <div class="absolute inset-0 z-20 flex flex-col pointer-events-none overflow-hidden">
        <div class="trionn-slat slat-0"></div>
        <div class="trionn-slat slat-1"></div>
        <div class="trionn-slat slat-2"></div>
        <div class="trionn-slat slat-3"></div>
        <div class="trionn-slat slat-4"></div>
    </div>

    <!-- Layer 3: Revealed Section 2 -->
    <div id="section-2-reveal" class="absolute inset-0 z-30 opacity-0 pointer-events-none flex items-center justify-center text-black">
        <h2 class="text-6xl font-bold">SECTION 02 (REVEALED)</h2>
    </div>

</section>
```

```css
.trionn-slat {
    position: relative;
    flex: 1; /* Mỗi thanh chiếm đúng 20% chiều cao */
    width: 100%;
    background-color: #d1d5db;
    transform-origin: bottom center;
    transform: scaleY(0);
    will-change: transform;
}
```

### 4.2 Cấu hình JavaScript (GSAP + ScrollTrigger + Lenis):
```javascript
// 1. Khởi tạo Lenis
const lenis = new Lenis({
    duration: 0.9,
    easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
    smoothWheel: true,
    wheelMultiplier: 1.3,
});

function raf(time) {
    lenis.raf(time);
    requestAnimationFrame(raf);
}
requestAnimationFrame(raf);

// 2. Kích hoạt GSAP
gsap.registerPlugin(ScrollTrigger);
lenis.on('scroll', ScrollTrigger.update);
gsap.ticker.add((time) => lenis.raf(time * 1000));
gsap.ticker.lagSmoothing(0);

// 3. Khởi tạo thuộc tính
gsap.set(".trionn-slat", { scaleY: 0, transformOrigin: "bottom center" });

// 4. Timeline ScrollTrigger
const tl = gsap.timeline({
    scrollTrigger: {
        trigger: "#hero-pinned-section",
        start: "top top",
        end: "+=1200", // Ghim trong khoảng 1200px
        pin: true,     // Tự động tạo .pin-spacer
        scrub: 0.3,    // Phản hồi cuộn tức thì
    }
});

// 5. Chuỗi Animation 5 thanh từ đáy lên
tl.to(".slat-4", { scaleY: 1, duration: 1.2, ease: "power1.inOut" }, 0.2)
  .to(".slat-3", { scaleY: 1, duration: 1.2, ease: "power1.inOut" }, 0.4)
  .to(".slat-2", { scaleY: 1, duration: 1.2, ease: "power1.inOut" }, 0.6)
  .to(".slat-1", { scaleY: 1, duration: 1.2, ease: "power1.inOut" }, 0.8)
  .to(".slat-0", { scaleY: 1, duration: 1.2, ease: "power1.inOut" }, 1.0)
  .to("#section-2-reveal", { opacity: 1, pointerEvents: "auto", duration: 0.4 }, 1.8);
```

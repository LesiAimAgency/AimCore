# 📐 ĐẶC TẢ THIẾT KẾ (DESIGN SPECIFICATION)
## Dự án: [INBETWEEN] Landing Page — Figma Node: `200-471`
> **Figma File:** `[INBETWEEN] Landingpage`  
> **Figma URL:** [https://www.figma.com/design/zTGzeXTwBXmDntQxHidoTi/-INBETWEEN--Landingpage?node-id=200-471](https://www.figma.com/design/zTGzeXTwBXmDntQxHidoTi/-INBETWEEN--Landingpage?node-id=200-471)  
> **Layout Canvas:** 1440px Grid · Dark Mode chủ đạo (#000000) kết hợp Light Section (#F9F9F9) · Accent Brand Orange (#EC460B)

---

## 1. 🎨 HỆ THỐNG MÀU SẮC (COLOR PALETTE)

| Màu | Mã Hex | Tên Token | Ứng dụng trong giao diện |
| :--- | :--- | :--- | :--- |
| ⬛ **Pure Black** | `#000000` | `--color-bg-dark` | Nền chính Header, Hero, Section 2, 4, 5, 8 |
| 🔲 **Off-White Paper** | `#F9F9F9` | `--color-bg-light` | Nền sáng Section 3 (Core Values), Section 6 (Stories), Section 7 (Packages) |
| 🟧 **Brand Orange** | `#EC460B` | `--color-brand` | Màu điểm nhấn nhận diện, CTA buttons, tiêu đề chính, chấm dot logo |
| ⬜ **Pure White** | `#FFFFFF` | `--color-white` | Màu chữ trên nền đen, nút pill trắng, icon footer |
| 🔘 **Silver Grey** | `#A9A9A9` / `#8B8B8B` | `--color-silver` | Text mô tả phụ (Body Light), subtitle, viền border mờ |
| 🔘 **Divider Border** | `#E5E5E5` / `#D9D9D9` | `--color-border` | Đường kẻ chia section trên nền trắng, viền thẻ card |
| 🍑 **Peach Gradient** | `#FFE7DA` → `#F5AD93` | `--gradient-peach` | Gradient 3 vòng tròn Venn Diagram trong Section 3 (Core Values) |

---

## 2. 🔤 HỆ THỐNG TYPOGRAPHY (FONT & TYPE SCALE)

### Danh mục Font Family:
1. **Primary Font (Sans-serif):** `SVN-Gilroy` (Typography chính cho 90% giao diện: Headings, Body, Buttons, Labels, Cards).
2. **Display Serif:** `Oai Brovile` / `Beautique Display` (Dành riêng cho chữ **VIP** ở Section 5 và **STORIES** ở Section 6).
3. **Secondary Sans:** `Be Vietnam Pro` (Dành cho phần Ngày/Giờ/Địa điểm/Agenda ở Section 5).
4. **Decorative Script:** `Pinyon Script` (Dành cho các từ trang trí uốn lượn: *Sharing*, *Find*, *Connect*, *Collaborated*, *Spreaded*).

### Bảng Type Scale chi tiết:

| Cấp bậc (Hierarchy) | Font Family | Size | Weight | Line Height | Letter Spacing | Case | Vị trí áp dụng |
| :--- | :--- | :--- | :--- | :--- | :--- | :--- | :--- |
| **Hero Display** | SVN-Gilroy | `80px - 96px` | 700 (Bold) | `1.0` | `-0.02em` | UPPERCASE | `ONE NETWORK ● ENDLESS POSSIBILITIES` (Sec 8) |
| **VIP Display** | Oai Brovile | `110px - 130px`| 700 (Bold) | `0.9` | `+0.1em` | UPPERCASE | `VIP` (Sec 5) |
| **Stories Display** | Oai Brovile | `76px - 84px` | 700 (Bold) | `0.95`| `-0.01em` | UPPERCASE | `STORIES` (Sec 6) |
| **Headline XL** | SVN-Gilroy | `54px - 61px` | 700 (Bold) | `1.05`| `-0.02em` | UPPERCASE | `HUYNH THI AI NHU` (Sec 4) |
| **Headline L** | SVN-Gilroy | `44px - 49px` | 700 (Bold) | `1.1` | `-0.02em` | UPPERCASE | `THE COMMUNITY`, `CREATING`, `CORE VALUES` |
| **Headline M** | SVN-Gilroy | `38px - 44px` | 700 (Bold) | `1.15`| `-0.01em` | Mixed | `Be a member of Our Community` (Sec 7) |
| **Headline S** | SVN-Gilroy | `22px - 28px` | 700 (Bold) | `1.2` | `0` | UPPERCASE | `LOREM IPSUM` (Sec 3), `PACKAGE 1` (Sec 7) |
| **Subhead / Slogan** | SVN-Gilroy | `22px - 25px` | 400 - 500 | `1.3` | `0` | Mixed | `Founder of INBETWEEN` (Sec 4) |
| **Body Large** | SVN-Gilroy | `18px - 20px` | 400 (Regular)| `1.4` | `0` | Mixed | Subtitle `Who we are inspire what we do` |
| **Body Regular** | SVN-Gilroy | `15px - 16px` | 400 / 300 | `1.5` | `0` | Normal | Paragraphs `Lorem ipsum...` |
| **Body Bold (News)** | SVN-Gilroy | `15px - 16px` | 700 (Bold) | `1.35`| `0` | UPPERCASE | Tiêu đề các Story cards (Sec 6) |
| **Navigation Link** | SVN-Gilroy | `14px` | 500 (Medium) | `1.0` | `+0.02em`| Mixed | `About us`, `Media`, `Community` |
| **Button / Label** | SVN-Gilroy | `11px - 12px` | 700 (Bold) | `1.0` | `+0.12em`| UPPERCASE | `JOIN COMMUNITY`, `UPCOMING EVENTS`, `JOIN US` |
| **Cursive Script** | Pinyon Script | `24px - 32px` | 400 (Italic) | `1.0` | `0` | Italic | *Sharing*, *Find*, *Connect*, *Collaborated* |

---

## 3. 📑 CHI TIẾT ĐẶC TẢ TỪNG SECTION (1 ĐẾN 8)

```
+-------------------------------------------------------------------------------+
| SECTION 1: HEADER & HERO WALL COLLAGE (1.svg)                                 |
| - Canvas: 1440px x 900px, Nền đen #000000 + gradient cam/đen                 |
| - Orbits: 3 vòng concentric rings (Soft Light mix blend mode)                  |
| - 10 Media Cards: 3D Floating layout với exact transforms                     |
+-------------------------------------------------------------------------------+
                                      │
                                      ▼
+-------------------------------------------------------------------------------+
| SECTION 2: THE COMMUNITY / CREATING (2.svg)                                   |
| - Canvas: 1440px x 900px, Nền đen #000000                                     |
| - Center: "THE COMMUNITY" (Cam) -> logo in•between -> "CREATING" -> 2 CTAs    |
| - 4 góc: 4 Photo cards (Influencers, Businesses, People, Creatives)           |
+-------------------------------------------------------------------------------+
                                      │
                                      ▼
+-------------------------------------------------------------------------------+
| SECTION 3: CORE VALUES & VENN DIAGRAM (3.svg)                                 |
| - Canvas: 1440px x 1090px, Nền sáng #F9F9F9                                   |
| - Top: Logo đen + "CORE VALUES" (Cam) + "Who we are inspire what we do"       |
| - Center: 3 Vòng tròn giao thoa (478px) gradient peach, mix-blend multiply    |
| - 2 Dấu cộng trắng (+) tại điểm giao thoa                                     |
| - Bottom: "OUR BUSINESS PARTNERS" + Marquee 12 logo đối tác                   |
+-------------------------------------------------------------------------------+
                                      │
                                      ▼
+-------------------------------------------------------------------------------+
| SECTION 4: FOUNDER & MISSION (4.svg)                                          |
| - Canvas: 1440px x 1152px, Nền ảnh Fullscreen Founder Huỳnh Thị Ái Như        |
| - Top-Left: "HUYNH THI AI NHU" (54px Bold) - "Founder of INBETWEEN"           |
| - 3 Floating Badges: YouTube, Facebook, Instagram                             |
| - Bottom-Left: "CONNECTING PEOPLE IS OUR VERY MISSION" (50px Bold)            |
+-------------------------------------------------------------------------------+
                                      │
                                      ▼
+-------------------------------------------------------------------------------+
| SECTION 5: UPCOMING EVENTS & VIP PREVIEW (5.svg)                              |
| - Canvas: 1440px x 1261px, Nền ảnh Spotlight Ballroom người đàn ông quay lưng |
| - Center Top: "UPCOMING EVENTS" (36px Bold, tracking rộng)                    |
| - Left Info: "PREMIUM EVENT", "VIP" (120px Brovile), "Private Preview" italic |
| - Date/Time/Location/Agenda (Font Be Vietnam Pro) + Button "JOIN US"          |
+-------------------------------------------------------------------------------+
                                      │
                                      ▼
+-------------------------------------------------------------------------------+
| SECTION 6: STORIES (6.svg)                                                    |
| - Canvas: 1440px x 1120px, Nền sáng #F9F9F9                                   |
| - Header 3 cột: "Hear the STORIES" (Brovile Cam) + Intro text + 4 Social icon |
| - 4 Story Cards: Ken, Hayo Jongejans, Thục Đoan, Mr. A (Bố cục so le)         |
+-------------------------------------------------------------------------------+
                                      │
                                      ▼
+-------------------------------------------------------------------------------+
| SECTION 7: MEMBERSHIP PACKAGES (7.svg)                                        |
| - Canvas: 1440px x 980px, Nền sáng #F9F9F9                                    |
| - Cột trái: "Be a member of Our Community" (Cam) + đoạn mô tả                 |
| - Cột phải: 3 Cards xếp chồng (Package 1: $29, Package 2: $49, Package 3: $69)|
| - List đặc quyền Privilege + Link "BECOME A MEMBER →"                         |
+-------------------------------------------------------------------------------+
                                      │
                                      ▼
+-------------------------------------------------------------------------------+
| SECTION 8: BRAND STATEMENT & FOOTER (8.svg)                                   |
| - Canvas: 1440px x 960px, Nền đen #000000                                     |
| - Banner lớn: "ONE NETWORK ● ENDLESS POSSIBILITIES" (96px Bold)               |
| - Footer 4 cột: Logo in•between, Contact info, Quick links, Socials & Copyrigh|
+-------------------------------------------------------------------------------+
```

---

## 4. 🧩 THỐNG KÊ ASSETS & VECTORS

* **Fonts:**
  * Local: `SVN-Gilroy` (10 weights đầy đủ trong `assets/font/SVN-Gilroy/`)
  * Local: `Oai Brovile` (`assets/font/Brovile/OAI-BROVILE.TTF`)
  * CDN: `Be Vietnam Pro`, `Pinyon Script`, `Playfair Display`
* **Vector Logos:**
  * [logo-white.svg](file:///c:/Users/someb/OneDrive/Desktop/New%20folder%20%284%29/assets/logo-white.svg)
  * [core-values-header.svg](file:///c:/Users/someb/OneDrive/Desktop/New%20folder%20%284%29/assets/core-values-header.svg)
  * [logo-footer.svg](file:///c:/Users/someb/OneDrive/Desktop/New%20folder%20%284%29/assets/logo-footer.svg)
* **Backgrounds & Card Images:**
  * `assets/hero-bg.png`, `assets/founder-bg.png`, `assets/events-bg.png`
  * `assets/image1_250_148.png` đến `image4_250_148.png` (Section 2)
  * `assets/story-1.png` đến `story-4.png` (Section 6)
  * `assets/partner-1.png` đến `partner-12.png` (Section 3)

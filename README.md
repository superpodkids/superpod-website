# SuperPod Kids — Website Concept

A single static page: no build step, no server required. Double-click `index.html` (or drag it into a browser tab) to preview it.

## Folder layout

```
Website/
  index.html        the page content (text, sections, layout)
  css/style.css      all colors, type, spacing
  fonts/             the two real brand-ish typefaces, as font files
```

## To change colors

Open `css/style.css` and edit the `:root { ... }` block at the very top. Every color on the page is a named variable there — change the hex value once and it updates everywhere that color is used. For example:

```css
--gold: #E8AE3D;   /* the CTA button + accent color */
--teal: #6FA8A2;   /* the "Meet the Pod" band */
```

## To change the artwork

The Kiko illustration in the hero, the wave dividers, the moon, and the stars are all hand-drawn shapes directly inside `index.html` (search for `<svg`). Two ways to change them:

1. **Easiest — swap in real art.** Replace an `<svg>...</svg>` block with an `<img src="images/kiko.png">` pointing at an actual illustration or photo (add an `images/` folder alongside `css/` and `fonts/`). This is the right move once real character art or trailer stills are ready.
2. **Tweak the placeholder shapes.** The SVG shapes use the same color variables as the rest of the page (`var(--orca)`, `var(--orca-belly)`, etc.), so recoloring them also happens in `style.css`. Reshaping them means editing the coordinates inside the `<path>` / `<ellipse>` tags directly — fiddly by hand, so it's usually easier to ask for a specific change (e.g. "make the dorsal fin taller") than to hand-edit the numbers.

## To change text / copy

All the copy (headlines, episode names, button labels) is plain text inside `index.html` — find the section by its comment (`<!-- ============ HERO ============ -->` etc.) and edit directly.

## To add real listening + resource links

Every `href="#"` in the "Listen on" panels and the Activity Book / Parent Guide / Teacher Guide pills is a placeholder. Two spots to fill in:

1. **Hero "Listen on your favorite platform"** (top of the page) — click it open, then it's 5 links to your show's page on each platform (same 5 links every time, since these point at the whole show, not one episode).
2. **Each episode card**, under `<!-- ============ SEASON ONE ============ -->` — click "Listen" open for that episode's 5 platform deep-links, or "Guides" open for its 3 resource pills (Activity Book, Parent Guide, Teacher Guide).

The platform colors/order live in `css/style.css` under `--pf-apple`, `--pf-spotify`, `--pf-youtube`, `--pf-amazon`, `--pf-iheart` — add or drop a platform by adding/removing one `<a class="pf-btn">` (or `.platform-badge` in the hero) per episode and one matching color variable.

Episode 6 ("Kiko's Gift") is marked `is-soon` and intentionally has no links yet — once it's ready, copy the two `<details class="disclosure ep-disclosure">` blocks from another episode card into it.

### Why these are collapsed

The "Listen" and "Guides" options are hidden behind click-to-open `<details>` elements (native HTML disclosure widgets — no JavaScript framework needed) instead of always showing all 8 links per episode, which felt cluttered with 6 episodes on the page. Only one panel stays open per episode card at a time (a small script in the `<script>` tag at the bottom of `index.html` closes the other one automatically).

## The trailer button

"Watch the Trailer" in the hero opens a lightbox with an embedded YouTube video, without leaving the page. Right now it shows a "Trailer coming soon" placeholder because no video is set yet. To wire up the real trailer once it's uploaded to YouTube:

1. Find `data-open-trailer data-yt-id=""` on the "Watch the Trailer" button in `index.html`.
2. Put the YouTube video ID between the quotes — that's the part of a YouTube URL after `watch?v=` (e.g. for `youtube.com/watch?v=abc123XYZ`, use `abc123XYZ`).
3. Save and reload — the button will now open the real video instead of the placeholder.

The video loads via `youtube-nocookie.com` (YouTube's privacy-enhanced embed domain) and only starts playing once someone clicks the button.

## What's still a placeholder

- The Kiko/pod SVG art is a simplified stand-in, not the real character illustrations from the Character Bible.
- Every listening platform link and every Activity Book / Parent Guide / Teacher Guide link is `href="#"` — none of them go anywhere yet.
- The trailer button shows "Trailer coming soon" until a real YouTube video ID is added (see above).
- The email signup form doesn't connect to anything real yet (no email service hooked up).

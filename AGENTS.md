# SuperPod Kids website — AI editing instructions

This is the source for superpodkids.com, a static HTML/CSS website with two PHP endpoints used to list downloads and press assets. The production site is hosted on Namecheap/cPanel.

## Working rules
- Preserve the current visual identity, typography, responsive layout, branding, and accessibility.
- Make focused changes; avoid wholesale rewrites or introducing a framework without approval.
- Preserve existing URL paths and public resources.
- Keep downloads/guides.php and press/list.php working on PHP hosting.
- Never put hosting credentials, tokens, private subscriber information, or server config secrets in Git.
- Note that the current homepage contains a client-visible Kit/ConvertKit form API key. Do not reproduce it in reports or new files; propose a server-side integration before treating it as secret.
- Never deploy to production automatically. Prepare changes for review and request explicit approval before publishing.
- For each change, describe files changed, expected effect, and how to test.
- Treat archived historical pages as out of scope unless explicitly requested.

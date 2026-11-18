This folder powers the "Press Kit" popup on the main site.

HOW IT WORKS
Nothing here needs to be edited by hand. Drop files in with your FTP client and
they show up on the site automatically the next time someone opens the Press
Kit popup — no code changes needed.

- Press releases: drop PDFs/Word docs/etc. directly in this folder (press/).
- Photos: drop images in the photos/ subfolder.

list.php is the only code file — it scans both folders each time the popup
opens and reports back what's there. Leave it in place.

Anything starting with a "." (like .DS_Store) is ignored automatically, so
it's safe to just drag files over from a Mac.

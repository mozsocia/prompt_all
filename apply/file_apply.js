import fs from 'fs';
import path from 'path';

console.log('Reading new.md...\n');
const md = fs.readFileSync('C:\\Users\\Mozdalif\\AppData\\Roaming\\Antigravity\\User\\globalStorage\\mozdalifsikder.project-markdown-exporter\\notes.md', 'utf-8');

// Debug info
console.log('File size:', md.length, 'bytes');
console.log('Line endings:', md.includes('\r\n') ? 'CRLF (Windows)' : 'LF (Unix)');

// Find "File:" lines for debugging (handles both bold and non-bold)
const fileLines = md.split(/\r?\n/).filter(line => line.includes('File:'));
console.log(`Found ${fileLines.length} "File:" line(s):`);
fileLines.forEach((line, i) => console.log(`  ${i + 1}. ${line}`));

console.log('\nScanning for file blocks...\n');

// Updated pattern to handle:
// - Bold format: **File: path/to/file.ts**
// - Non-bold format: File: path/to/file.ts
// - Backtick format: File: `path/to/file.ts`
// - Combined: **File: `path/to/file.ts`**
// - Trailing text after path: File: `path/to/file.ts` (updated)
// - Up to 10 intermediate lines (comments, blanks) before the code fence
const pattern = /\*{0,2}File:\s*`?([^\r\n*`]+)`?\*{0,2}[^\r\n]*(?:\r?\n(?!```)[^\r\n]*){0,10}\r?\n```\w*\r?\n([\s\S]*?)\r?\n```/g;
const matches = [...md.matchAll(pattern)];

if (matches.length === 0) {
  console.log('❌ No file blocks matched!');
  console.log('\nDebug: Check if code fences exist after "File:" lines');
  
  // Show context around first "File:" line
  const idx = md.indexOf('File:');
  if (idx !== -1) {
    console.log('\nContext around first "File:":');
    console.log('---');
    console.log(JSON.stringify(md.slice(idx, idx + 150)));
    console.log('---');
  }
  
  process.exit(1);
}

console.log(`✅ Matched ${matches.length} file block(s):`);
matches.forEach(([, filePath], i) => {
  // Clean path for display
  const cleanPath = filePath.trim().replace(/^[*`]+|[*`]+$/g, '').trim();
  console.log(`  ${i + 1}. ${cleanPath}`);
});

console.log('\nCreating files...\n');

let successCount = 0;
let errorCount = 0;

for (const [, filePath, content] of matches) {
  // Clean the file path: trim whitespace and remove any asterisks/backticks from start/end
  const p = filePath.trim().replace(/^[*`]+|[*`]+$/g, '').trim();
  
  // Validate the path doesn't contain invalid Windows characters
  const invalidChars = /[<>:"|?*]/;
  if (invalidChars.test(p)) {
    console.log(`  ⚠️  Skipped (invalid characters): ${p}`);
    errorCount++;
    continue;
  }

  if (!p) {
    console.log(`  ⚠️  Skipped (empty path)`);
    errorCount++;
    continue;
  }
  
  const dir = path.dirname(p);
  
  try {
    if (dir && dir !== '.') {
      fs.mkdirSync(dir, { recursive: true });
    }
    
    fs.writeFileSync(p, content);
    console.log(`  ✅ Created: ${p} (${content.length} bytes)`);
    successCount++;
  } catch (err) {
    console.log(`  ❌ Error creating ${p}: ${err.message}`);
    errorCount++;
  }
}

console.log('\n' + '='.repeat(50));
console.log(`✨ Done! Created ${successCount} file(s)${errorCount > 0 ? `, ${errorCount} error(s)` : ''}`);

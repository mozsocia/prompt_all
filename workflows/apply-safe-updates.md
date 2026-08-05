---
description: Carefully apply user-provided code updates safely, error-free, and with context verification.
---

### Workflow: Safe Code Update Application

#### **Goal**
Systematically apply user-provided code updates to existing files or create new files while ensuring zero syntax errors, maintaining existing API contracts, avoiding unintended side effects, and preserving codebase integrity.

---

### **Step 1: Input Analysis & Target Inspection**
1. **Analyze User-Provided Updates:**
   - Extract target files, line ranges, proposed modifications, and specific requirements from the user's update prompt.
   - Identify whether updates involve adding new features, refactoring existing functions, fixing bugs, or updating schemas.

2. **Inspect Target Files:**
   - Read and inspect the actual target files before making any modifications to confirm line contents, imports, types, and context.
   - Do NOT assume file structures or line numbers without viewing the actual source code.

3. **Dependency & Caller Impact Analysis:**
   - Locate related files, imported types, or caller functions that interact with the modified sections.
   - Note any function signature changes, prop updates, or contract breaks that require updates in calling files.

---

### **Step 2: Incremental & Precise Code Application**
1. **Preserve Code Quality & Context:**
   - Keep all existing unrelated functions, docstrings, formatting, and comments intact unless explicitly told to alter them.
   - Maintain established repository patterns (casing, error handling, visual styling, modular layout).

2. **Apply Target Edits Carefully:**
   - Make precise edits using targeted search-and-replace or line-range updates.
   - Ensure all necessary imports, standard library modules, and local utilities are correctly added or updated.
   - Avoid hardcoding magic values, swallowing exceptions silently, or inserting unverified fallback placeholders.

3. **Scope Control & Dynamic Safety:**
   - Verify non-null states and object initialization prior to property dereferencing.
   - Enforce exact function signatures and property names matching the callers.

---

### **Step 3: Verification & Integrity Audit**
1. **Syntax & Logic Verification:**
   - Review applied edits line-by-line for syntax correctness, proper bracket/parenthesis balance, and variable scope.
   - Ensure no temporary, unfinished, or placeholder snippets remain.

2. **Contract & Regression Check:**
   - Verify that all exported methods, class structures, or UI components remain backward-compatible unless breaking changes were explicitly requested.
   - Confirm all call-sites updated in Step 1 align with modified function parameters.

---

### **Step 4: Summary & Delivery**
1. **Summarize Changes:**
   - List the files created or modified with direct file links.
   - Highlight core updates made, fixed edge cases, and any critical non-obvious design choices.

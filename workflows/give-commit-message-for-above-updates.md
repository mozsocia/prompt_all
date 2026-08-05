---
description: Generate clear, structured Conventional Commit messages based on recent code updates and changes.
---

### Workflow: Commit Message Generation

#### **Goal**
Systematically analyze recent code updates, diffs, and task context to construct precise, standardized commit messages following the Conventional Commits specification.

---

### **Step 1: Context & Change Inspection**
1. **Analyze Modified Resources:**
   - Inspect all recently updated files, added/modified functions, created components, or deleted assets.
   - Determine the primary objective and side effects of the changes.

2. **Determine Conventional Commit Type:**
   - `feat`: A new feature or capability added to the application.
   - `fix`: A bug fix or error resolution.
   - `refactor`: Code restructuring without changing external behavior or adding features.
   - `style`: Formatting, whitespace, CSS tweaks, or visual design updates.
   - `docs`: Documentation updates, code comments, or workflow guide changes.
   - `perf`: Code changes that improve performance.
   - `test`: Adding or updating unit/integration tests.
   - `chore`: Maintenance tasks, dependency updates, or config changes.

3. **Identify Scope (Optional):**
   - Identify the affected layer, module, or package (e.g., `types`, `provider`, `ui`, `workflow`).

---

### **Step 2: Commit Message Construction Rules**

1. **Header Formatting (`<type>(<scope>): <summary>`):**
   - Use imperative, present tense (e.g., "add", "fix", "update", not "added", "fixed", "updated").
   - Keep header length strictly under **72 characters** (ideally <= 50).
   - Do not capitalize the first letter of the summary line (unless it starts with a proper noun or code symbol).
   - Do not end the header line with a period (`.`).

2. **Body Formatting (For non-trivial updates):**
   - Separate header from body with a single blank line.
   - Focus on explaining **what** was changed and **why**, rather than mechanical implementation details.
   - Use bullet points for distinct, non-contiguous updates.

3. **Footer (If applicable):**
   - Flag breaking changes clearly starting with `BREAKING CHANGE: <description>`.
   - Reference issue numbers or task IDs where relevant.

---

### **Step 3: Generate Commit message**

Present the generated commit message  clearly (only message not git command):

1. **Concise One-Liner** (for git command-line / quick commits)
2. **Detailed Version** (when changes span multiple files/modules)


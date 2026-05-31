
Here's a concise "prompt init" you can use:

---

**Prompt Init:**

```
Please review the attached code files and provide a detailed analysis covering:

1. **Bugs & Logic Issues** – Any errors, edge cases, or incorrect behavior
2. **Security Concerns** – Vulnerabilities, unsafe practices, or risks
3. **Performance** – Bottlenecks, inefficient operations, or optimization opportunities
4. **Code Quality** – Readability, maintainability, naming, structure, and adherence to best practices
5. **Architecture & Design** – Design patterns, separation of concerns, coupling/cohesion
6. **Error Handling** – Missing or improper exception handling
7. **Potential Improvements** – Refactoring suggestions

Provide a clear, actionable plan with:
- Issues categorized by severity (Critical / Major / Minor)
- Specific file names and line references where applicable
- Concrete suggestions on how to fix each issue

Do NOT modify the code yet — only provide the review and plan.
```

---

This keeps the review structured so that when you run it 3 times, the plans are easily comparable, and the chosen plan will be specific enough to drive the "prompt apply" step.

---
---
---



Here's a refined, concise "prompt init" version:

---

**Prompt Init:**

```
Act as an expert code reviewer. Review the provided code files and give me:

**Review Analysis:**
- Security vulnerabilities
- Critical bugs or logic errors
- Performance issues
- Bad practices or anti-patterns
- Missing error handling

**Action Plan:**
Provide a prioritized list of changes needed:
1. Critical (must fix - security/crashes)
2. Important (should fix - bugs/maintainability)  
3. Minor (nice to fix - style/optimization)

For each item, specify:
- File and location
- What to change
- Why it matters

Keep it concise but actionable. Do NOT rewrite the code yet.
```

---

**Alternative shorter version:**

```
Review this code for security, bugs, performance, and quality issues. Provide a prioritized action plan (Critical/Important/Minor) with specific fixes needed. Don't rewrite code yet, just the analysis and plan.
```

Choose the first for detailed, structured output or the second for faster, more direct results.

----
----

Here's a comprehensive "prompt check" for reviewing the implementation:

---

**Prompt Check:**

```
Act as an expert code reviewer. I have implemented changes to the code files based on a previous review plan.

**Review this implementation by checking:**

1. **Plan Compliance**
   - Were all changes from the review plan implemented?
   - Are there any missing implementations?
   - Were any parts implemented incorrectly or incompletely?

2. **Implementation Quality**
   - Are the changes well-integrated with existing code?
   - Is the implementation clean and maintainable?
   - Does it follow the same coding style/patterns as the original code?

3. **Side Effects & Regressions**
   - Did the changes introduce any new bugs?
   - Are there any unintended side effects?
   - Do existing features still work correctly?

4. **Edge Cases & Robustness**
   - Are edge cases handled properly?
   - Is error handling improved or at least maintained?
   - Are there any security vulnerabilities introduced?

5. **Documentation & Comments**
   - Are complex changes properly documented?
   - Are comments updated to reflect changes?
   - Is the code self-explanatory where possible?

**For each finding, specify:**
- File and line number
- Whether it's a ✅ (success), ⚠️ (warning), or ❌ (issue)
- Brief explanation

**Output format:**
```

**Alternative shorter version:**

```
Review the implementation of my code changes against the original review plan. Check:
- Were all planned changes implemented correctly?
- Did the changes introduce any new issues or regressions?
- Is the implementation clean, maintainable, and well-integrated?
- Are there any side effects or edge cases not handled?

For each finding, note if it's a success (✅), warning (⚠️), or issue (❌) with location.
```

---

**Or even more concise:**

```
Verify my implementation against the review plan. Check for:
1. Completeness - all planned changes done?
2. Correctness - changes work as intended?
3. Quality - clean, maintainable code?
4. Regressions - no new bugs introduced?

List issues with file:line and severity.
```

Choose based on how detailed you need the implementation review to be.

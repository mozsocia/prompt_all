reasoning
```
The user wants me to create a better, more generalized prompt that they can use after completing any complex task with me. The prompt should ask me to generate a detailed guide in .md format documenting the work done, the approach taken, lessons learned, and patterns followed — so that in future chats, they can provide this guide to help me replicate similar work efficiently.

Let me craft a well-structured, generalized prompt that works for any complex task, not just test creation.
```
# Updated Universal Prompt

Use the below prompt after completing any complex task:

````
Now that we have successfully completed this task, create a comprehensive guide in a `.md` file documenting everything about how this work was done.

## The guide must include:

1. **Task Overview** – What was the task, what was the goal, and what was the final output.
2. **Input Requirements** – What files, codes, context, or information were needed to start the work.
3. **Step-by-Step Approach** – The exact sequence of steps followed from start to finish.
4. **Key Decisions & Reasoning** – Why certain approaches were chosen over alternatives, and any trade-offs made.
5. **Patterns & Conventions Followed** – Any coding patterns, naming conventions, structural patterns, or best practices applied.
6. **Challenges Faced & Solutions** – Any issues, edge cases, or tricky parts encountered during the work and how they were resolved.
7. **Common Pitfalls to Avoid** – Mistakes or anti-patterns to watch out for when doing similar work.
8. **Dependencies & Prerequisites** – Any tools, libraries, configurations, or setup required.
9. **Reference Snippets** – Key code snippets or templates that can be directly reused or adapted for similar future tasks.
10. **Checklist** – A final checklist to verify the work is complete and correct.

## Important Instructions:
- Write this guide as if you are instructing a **fresh AI chat session with zero prior context** — it should be self-contained and complete.
- Be **concise but detailed** — no fluff, but don't skip any critical detail.
- Use **clear structure with headings, bullet points, and code blocks** for easy scanning.
- Include **actual examples from this task** wherever possible, not generic/abstract advice.
- The guide should enable the next chat to **replicate the same quality of work with minimal back-and-forth**.
````

---

## What Makes This Better Than the Original

| Aspect | Original Prompt | Updated Prompt |
|---|---|---|
| **Scope** | Only for test creation | Works for **any complex task** |
| **Structure** | Vague ("full guide") | **10 clearly defined sections** |
| **Context handling** | Assumes AI knows what to include | Explicitly asks for **inputs, decisions, pitfalls, checklist** |
| **Reusability** | Tied to one use case | **Generalized and reusable** across all tasks |
| **Quality control** | No verification step | Includes a **checklist section** |
| **Fresh chat readiness** | Mentioned but not enforced | Explicitly says **"zero prior context, self-contained"** |

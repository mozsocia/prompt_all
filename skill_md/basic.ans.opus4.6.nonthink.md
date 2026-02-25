# Updated Prompt

Here's the improved, generalized prompt you can use after completing **any complex task**:

```
Now create a comprehensive guide in a .md file documenting the complete process, methodology, patterns, decisions, challenges, and solutions from the work we just completed. 

The guide should include:

1. **Objective** – What was the task and its goal
2. **Input Requirements** – What files/codes/information were needed to start
3. **Step-by-Step Process** – Exact sequence of steps followed to complete the work
4. **Patterns & Conventions** – Any patterns, naming conventions, structures, or standards followed
5. **Key Decisions & Reasoning** – Why specific approaches were chosen over alternatives
6. **Common Pitfalls & Solutions** – Problems encountered during the work and how they were resolved
7. **Dependencies & Prerequisites** – Tools, libraries, configurations, or setup required
8. **Code Snippets & Templates** – Reusable boilerplate or template code that can be applied to similar future tasks
9. **Checklist** – A final checklist to verify completeness and correctness of the work
10. **Quick Reference** – A condensed summary section for fast lookup

Make the guide:
- Concise yet detailed enough that in a **fresh new chat with zero prior context**, you can replicate the same quality of work by just reading this guide
- Written as an **instruction manual for yourself (AI)** so when I provide this guide along with new task-related files/codes in a future chat, you can follow it and produce accurate results immediately
- Include real examples from the work we just did (sanitized if needed) to illustrate each point

Output the guide as a single .md file ready to use.
```

---

## Why This Prompt Is Better

| Aspect | Old Prompt | New Prompt |
|---|---|---|
| **Scope** | Locked to e2e test creation only | Works for **any complex task** |
| **Structure** | No defined sections | 10 clear sections requested |
| **Reusability** | Mentions specific module/controller | Generalized language |
| **Context recovery** | Vague ("full guide") | Explicitly says "fresh chat with zero prior context" |
| **Audience clarity** | Unclear who the guide is for | Clearly states "instruction manual for yourself (AI)" |
| **Practical value** | No mention of pitfalls/decisions | Captures **reasoning, pitfalls, templates, checklist** |
| **Examples** | Not requested | Asks for **real examples from completed work** |

---

## How to Use

1. Complete any complex task in a chat
2. Paste the prompt above at the end
3. Save the generated `.md` file
4. In future chats, attach the `.md` file + new task files and say:

```
Follow the attached guide (.md) to complete the same type of work for the new files/codes provided below.
```

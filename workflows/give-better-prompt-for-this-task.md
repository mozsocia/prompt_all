---
description: Analyze a given task or prompt and construct an optimized, high-performing version using advanced prompt engineering principles.
---

# Workflow: Prompt Optimization (`/give-better-prompt-for-this-task`)

Use this workflow to transform a raw task description, active document selection, or draft prompt into a precise, battle-tested prompt for AI models.

---

## Step 1: Gather & Deconstruct Context

1. **Locate Input Context:**
   - Inspect the active selection, open file, or preceding chat message for the prompt/task needing optimization.
   - If no task or prompt is provided, prompt the user for:
     1. Current draft or description of the task.
     2. Target audience or domain context.
     3. Preferred output format or technical constraints.

2. **Analyze the Gaps:**
   - **Objective:** Is the core goal clear and actionable?
   - **Persona:** Is an appropriate expert role specified?
   - **Structure:** Is the required output format strictly defined?
   - **Guardrails:** Are negative constraints or edge cases handled?

---

## Step 2: Apply the Prompt Structure Framework

Rebuild the prompt using the **RTFC Framework** (Role, Task, Format, Constraints) with **Goal Reinforcement**:

- **Role / Persona:** Assign an authoritative, domain-expert persona (e.g., *"You are a Principal Software Architect..."*).
- **Context & Background:** Provide domain context, environment details, or source material bounded in explicit XML tags (e.g., `<context>`, `<source_code>`).
- **Task Directives (Primary Statement):** Write clear, imperative instructions detailing the core objective.
- **Goal Reinforcement (Task Rephrasing):** **CRITICAL:** Rephrase the main task at least **two times** in distinct ways across the prompt (e.g., once in the detailed instruction section and once in a concluding *"Primary Goal Summary"* section). Dual-framing reinforces model attention and prevents goal drift.
- **Output Format:** Detail the exact response layout (e.g., markdown tables, JSON schema, section headings, code blocks).
- **Constraints & Rules:** Explicitly define negative constraints (*"Do NOT use..."*, *"Limit output to..."*) and boundary conditions.
- **Variables:** Mark user-customizable values using `[BRACKETED_PLACEHOLDERS]`.

---

## Step 3: Quality Checklist

Ensure the optimized prompt satisfies these criteria before outputting:
- [ ] **Dual Task Rephrasing:** The main task goal is explicitly stated and rephrased in at least two different ways to maximize attention.
- [ ] **Eliminate Subjectivity:** Replaces vague terms (*"good"*, *"fast"*, *"better"*) with quantitative metrics or explicit definitions.
- [ ] **Structural Clarity:** Employs markdown headings and XML tags for clear section separation.
- [ ] **Deterministic Formatting:** Enforces explicit schemas, templates, or output examples.

---

## Step 4: Deliverable Output Format

Present the final response to the user using the following template:

### 1. 🔍 Analysis of Original Input
- Briefly state what was missing or vague in the original prompt/task (e.g., lack of role, unspecified format, missing goal reinforcement).

### 2. ⚡ Optimized Production Prompt
```markdown
[Insert the complete, copy-pasteable optimized prompt here]



```
now use [process-ai-prompt](recipe;file:///c%3A/Users/Mozdalif/.gemini/config/global_workflows/process-ai-prompt.md)  to get the implementation code from the api call. Please bundle all findings and data gathered by the subagent into the header and footer context prompts properly. Once all required data, feature specifications, and files are assembled, invoke the API call with this complete payload to get a precise and comprehensive implementation.

```


### use [process-ai-prompt] to get  implementation code
```
Execute [process-ai-prompt](recipe;file:///c%3A/Users/Mozdalif/.gemini/config/global_workflows/process-ai-prompt.md) to fetch the complete implementation code from the API. Bundle all relevant project files, feature specifications, and agent/subagent-collected data into the prompt structure (header, file bundle, and footer) to ensure an accurate and seamless code generation run. Ensure that all gathered context, files, and agent/subagent findings are fully integrated into the prompt payload (including header and footer sections , please rephrase header intruction in footer too so LLM can understand context properly) so the model has the exact data needed to implement the updates accurately.
```


### agy-subagent [process-ai-with-agy-subagent] to do research and ask before implementation
```
Please make an agy-subagent using [process-ai-with-agy-subagent](slashCommand;process-ai-with-agy-subagent) to perform a comprehensive investigation for this feature. The subagent must thoroughly inspect all relevant codebase files in the main project, as well as the underlying library source code inside the `.venv/vendor/node_modules` directory required for implementation. please Have the subagent deeply analyze both the primary project files and relevant installed package implementations within the `.venv/vendor/node_modules`. Do not proceed with implementation yet; report back with complete findings  Once the subagent finishes gathering all necessary data and technical context,  the findings and notify me so I can provide the next implementation instructions. alert me before taking any further action so I can supply the execution plan.

```

### agy-subagent [process-ai-with-agy-subagent] to do implementation
```
Do not implement this feature yourself; instead, make an agy-subagent using [process-ai-with-agy-subagent](slashCommand;process-ai-with-agy-subagent) to handle the task. Delegate this implementation task to a dedicated agy-subagent instead of performing it directly and equip the agy-subagent with all necessary project files, specifications, and contextual data required to complete the implementation properly from end to end. Ensure you provide the agy-subagent with complete context, relevant files, and all required data so it can execute the feature accurately and autonomously.  so it has everything needed for an error-free, robust implementation.

```


---



### subagent to do research and ask before implementation
```
Please spawn a research subagent to perform a comprehensive investigation for this feature. The subagent must thoroughly inspect all relevant codebase files in the main project, as well as the underlying library source code inside the `.venv/vendor/node_modules` directory required for implementation. please Have the subagent deeply analyze both the primary project files and relevant installed package implementations within the `.venv/vendor/node_modules`. Do not proceed with implementation yet; report back with complete findings  Once the subagent finishes gathering all necessary data and technical context,  the findings and notify me so I can provide the next implementation instructions. alert me before taking any further action so I can supply the execution plan.

```


### subagent to do implementation
```
Do not implement this feature yourself; instead, spawn a subagent to handle the task. Delegate this implementation task to a dedicated subagent instead of performing it directly and equip the subagent with all necessary project files, specifications, and contextual data required to complete the implementation properly from end to end. Ensure you provide the subagent with complete context, relevant files, and all required data so it can execute the feature accurately and autonomously.  so it has everything needed for an error-free, robust implementation.

```

### minimal codes for implementation

```
Keep the implementation minimal, elegant, and fully functional. Ensure the code is correct, easy to understand, and highly readable, prioritizing concise and idiomatic patterns over verbose approaches.
```

```

Deliver a clean, correct, and robust solution with minimal code footprint. Favor idiomatic, concise conventions that maximize human readability and maintainability without unnecessary verbosity.
```

```

Write idiomatic, minimal, and elegant code that meets all functional requirements accurately. Keep the logic straightforward, highly readable, and free of over-engineered or verbose boilerplate.
```

---

```
Provide clean, idiomatic, and minimal code that fully and correctly solves the task. Prioritize readability, simplicity, and maintainability without omitting core functionality. 

```

```
Modify existing files where possible and limit new file creation to 1–2 files maximum.
```

```

Deliver a complete, correct, and highly readable solution using minimal and idiomatic code. Keep the implementation concise and maintainable without adding unrequested functionality or extra commentary. Limit changes strictly to editing existing files or creating at most 1–2 new files. Output only the final solution code.

```

```
Write complete, correct, and maintainable code adhering strictly to idiomatic best practices and minimalism. Do not over-engineer. while keeping it fully functional, correct, easy to understand and keep it highly readable for humans.
```

```
Write minimal, idiomatic, and robust code that is fully functional and maintainable. Avoid over-engineering, keeping the implementation simple, clean, and highly readable for developers.
```



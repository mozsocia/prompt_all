---
description: Create commit message for staged changes
---

Analyze only/ staged changes ( run this command one time only to get all info ` git status ; git diff --staged ; git log -n 5`  do not run any other command please  give commit message based on this info) provide a short commit message with some bullet point details following the project's style.

Move as fast as possible. Do not overthink or gather extra information. Focus only on the given references and finish quickly.


example commit message:

```
feat(purchase): support default freight expense account fallback for additional charges

- Make account_id optional in AdditionalChargeSchema validation.
- Add FREIGHT_EXPENSE (default_freight_expense_account_id / 5020 code) to default accounts constants, setting entries, and Chart of Accounts.
- Implement resolveFreightAccount in DefaultAccountResolver to resolve the fallback account from the company settings.
- Resolve missing account_id on purchase additional charges in PurchaseService and raise a validation error if no default is configured.
```

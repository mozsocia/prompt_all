
### step 1:
to effectivly update all entity frontend files first update one entity fies , then commit (1-3 commits). then use below prompt to make a rough guide using qwen-cli/gemint-cli

```
analyze last three commit, give a details guide what hannens in which file ,what changes have been done in which file ( all updates are in account entity codes) because from this guide i will apply same updates to other entity too
```



then make a .md file of that rought guide and save it in docs folder,

### step 2:

Then use with that .md guide and below like prompt to update only list view columns types files

```

i have update 'account' entity to use unified section fields. now i want to update 'contact' entity to use unified section fields. follow the same pattern as 'account' entity. see `section-field-refactoring-guide.md` for more details.

i will update edit add quick-edit page and form component later


### Reference Files (Account)
- `viteapp/src/pages/account/columns.tsx`
- `viteapp/src/pages/account/list-account-page.tsx`
- `viteapp/src/pages/account/types.ts`
- `viteapp/src/pages/account/view-account-page.tsx`

### Files to Update (Contact)
- `viteapp/src/pages/contact/columns.tsx`
- `viteapp/src/pages/contact/list-contact-page.tsx`
- `viteapp/src/pages/contact/types.ts`
- `viteapp/src/pages/contact/view-contact-page.tsx`



[ files here ]


first describe me what will you do to solve the problem , after i read the guide i will ask you to give solution codes

after reading your details i will give you viteapp/src/pages/contact/view-contact-page.tsx page files codes

do you need to see any other files that you have given if needed please ask

Let's Think Step by Step


```


### step 3:

in the next response give the remaining files , like below 

```
[ files here]

Generate the new code now, for code part start with the "File: [path]" line , followed by the code block wraped by triple backticks with the language identifier.

please do the updates in same patterns

Let's Think Step by Step

```



### step 4: 

after generating ans give this below prompt to get a full prompt to update next entity without giving reference files ( like account files)


```
now give me a detailed prompt which i will give you in a new fresh chat with same list types view columns files of "Opportunity" (or any other entity ) entity to do same updates, please in the prompt describe in a way so i do not have to give 'Account' entity files to apply same updates to "opportunity" ( or any other entity) in same patterns, i will give the prompt with "opportunity"( or any other entity ) entity files to apply same updates

```

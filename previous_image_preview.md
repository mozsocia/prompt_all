
#### last successfull prompt which makes a simple implementation:

---

Task:
please make way to show image preview of old image

make a reusable component for this purpose

from this part of backend code you can see for remove an image 'remove_image' true should be set in the submit data, so you have to make an way to do that also

this process will be used in every part of this CRM project for images so make it that kind of scallable and reusabble

```

        if ($isUpdate) {
            $rules['image'] = 'sometimes|array';
            $rules['image.data'] = 'sometimes:image|string';
            $rules['image.filename'] = 'sometimes:image|string';
            $rules['image.remove_image'] = 'sometimes|boolean';
            $rules['gallery_images'] = 'sometimes|array';
            $rules['gallery_images.*.data'] = 'sometimes:image|string';
            $rules['gallery_images.*.filename'] = 'sometimes:image|string';
            $rules['gallery_images.*.remove_image'] = 'sometimes|boolean';
            $rules['gallery_images.*.path'] = 'sometimes|string';
```


i want to use CustomFileUpload in the edit-article.tsx page so make thinks like that where you will not abstract away CustomFileUpload in another component , CustomFileUpload is already abstract away too much info in a component


Now give me step by step guide how you will you solve this problem , what files you are going to create and how is this approach is the best without the codes

so give all the details without the codes , i ask the codes after this first response after reading the full details

---


## process guide 

- The LLM  must make a component to show preview which will be placed on top of file upload input 

- LLM must not manage or process any state outside of the edit-page file, 

- for first and make it easy for LLM tell/let him make useState in for file removal state, no state for preview ( bad practice)

- do not prepare data for submit in form state after user click submit prepare file to post in submit function

- after success in above process then tell him to not use any state for file upload only use zod with react-hook-form

- to not use seperate state you need to try to ask fresh multiple times to get a well structured output









i want a vue 3 component where i want to edit data and submit to a database 
- use vue 3 composition api (setup)
- use tailwind and high starndard design
- you get data from api and fill up input fields and user can edit data in input field and submit , 
- give all field if is null or not , because some user will have other field data 
- submit mulipart form data to api
- image fields must be 'file' or sumbit will not work
- take all data serously do not skip any key
- show full code , do not explain
- show all errors in page if happens any
- do not use loop to render input fields



here is api end points and json data 

get input value from api : `/api/accounts/profile/user/`

submit data api : `/api/accounts/profile/user/update/`

```

{
    "id": 6,
    "name": "Reseller1",
    "phone": "01711223344",
    "points": 0,
    "amount": "15.00",
    "email": "reseller1@example.com",
    "image": "/media/users_images/798d6a47db75d40c632e1238acb9262e.jpg",
    "is_reseller": true,
    "is_company_staff": false,
    "is_manager": false,
    "is_assitant_manager": false,
    "accept_terms": false,
    "customer": {
        "id": 6,
        "cus_full_name": "Reseller1",
        "cus_img": null,
        "cus_city": "dhaka",
        "cus_state": "null",
        "cus_postcode": "null",
        "cus_country": "null",
        "total_purchase_amount": "0.00",
        "ship_name": "null",
        "ship_add": "null",
        "ship_city": "null",
        "ship_state": "null",
        "ship_postcode": "null",
        "ship_country": "null",
        "ship_phone": "null"
    }
}
```

sample edit.vue componenent
```
<template>
  <div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-6">Edit Profile</h2>
    <form @submit.prevent="submitForm" class="space-y-4">
      <!-- Basic Information -->
      <div>
        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
        <input type="text" id="name" v-model="formData.name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
      </div>
      <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" id="email" v-model="formData.email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
      </div>
      <div>
        <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
        <input type="tel" id="phone" v-model="formData.phone" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
      </div>
      <div>
        <label for="image" class="block text-sm font-medium text-gray-700">Profile Image</label>
        <input type="file" id="image" @change="handleImageChange" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
      </div>

      <div class="flex items-center">
        <label class="mr-2 block text-sm font-medium text-gray-700">Is Reseller</label>
        <input type="checkbox" v-model="formData.is_reseller" class="mt-1 rounded text-indigo-600 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
      </div>

      <!-- Customer Information -->
      <div>
        <label for="cus_full_name" class="block text-sm font-medium text-gray-700">Full Name</label>
        <input type="text" id="cus_full_name" v-model="formData.customer.cus_full_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
      </div>


      <!-- Shipping Information -->
      <div>
        <label for="ship_name" class="block text-sm font-medium text-gray-700">Shipping Name</label>
        <input type="text" id="ship_name" v-model="formData.customer.ship_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
      </div>
      <div>
        <label for="ship_add" class="block text-sm font-medium text-gray-700">Shipping Address</label>
        <input type="text" id="ship_add" v-model="formData.customer.ship_add" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
      </div>

      <div>
        <label for="ship_phone" class="block text-sm font-medium text-gray-700">Shipping Phone</label>
        <input type="tel" id="ship_phone" v-model="formData.customer.ship_phone" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
      </div>

      <!-- Error messages -->
      <div v-if="errors.length" class="bg-red-50 border-l-4 border-red-400 p-4 mb-4">
        <div class="flex">
          <div class="flex-shrink-0">
            <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
            </svg>
          </div>
          <div class="ml-3">
            <h3 class="text-sm font-medium text-red-800">There were errors with your submission</h3>
            <div class="mt-2 text-sm text-red-700">
              <ul class="list-disc pl-5 space-y-1">
                <li v-for="error in errors" :key="error">{{ error }}</li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div>
        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
          Update Profile
        </button>
      </div>
    </form>
  </div>
</template>

<script>
import { ref, reactive, onMounted } from 'vue';
import axios from 'axios';

export default {
  setup() {
    const formData = reactive({
      name: '',
      email: '',
      phone: '',
      is_reseller: false,
      image: null,
      customer: {
        cus_full_name: '',
        ship_name: '',
        ship_add: '',
        ship_phone: '',
      },
    });

    const errors = ref([]);

    const fetchUserData = async () => {
      try {
        const response = await axios.get('/api/accounts/profile/user/');
        Object.assign(formData, response.data);
        formData.customer = { ...formData.customer };

        // delete images key so it will not have any initial value
        delete formData.image;
        delete formData.customer.cus_img;
      } catch (error) {
        console.error('Error fetching user data:', error);
        errors.value.push('Failed to load user data. Please try again.');
      }
    };

    const handleImageChange = (event) => {
      formData.image = event.target.files[0];
    };

    const submitForm = async () => {
      errors.value = [];
      const formDataToSend = new FormData();

      // Append all form fields to FormData
      Object.keys(formData).forEach(key => {
        if (key === 'customer') {
          Object.keys(formData.customer).forEach(customerKey => {
            formDataToSend.append(`customer.${customerKey}`, formData.customer[customerKey]);
          });
        } else if (key === 'image' && formData[key] instanceof File) {
          formDataToSend.append(key, formData[key]);
        } else {
          formDataToSend.append(key, formData[key]);
        }
      });

      try {
        await axios.post('/api/accounts/profile/user/update/', formDataToSend, {
          headers: {
            'Content-Type': 'multipart/form-data',
          },
        });
        alert('Profile updated successfully!');
      } catch (error) {
        console.error('Error updating profile:', error);
        if (error.response && error.response.data) {
          Object.keys(error.response.data).forEach(key => {
            errors.value.push(`${key}: ${error.response.data[key]}`);
          });
        } else {
          errors.value.push('An error occurred while updating your profile. Please try again.');
        }
      }
    };

    onMounted(fetchUserData);

    return {
      formData,
      errors,
      handleImageChange,
      submitForm,
    };
  },
};
</script>
```

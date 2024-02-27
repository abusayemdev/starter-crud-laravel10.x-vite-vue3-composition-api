<!-- resources/js/components/user/auth/CustomerRegister.vue -->
<script setup>

import { ref } from 'vue';
import axios from 'axios';
import { route } from 'routeHelper';

//variables
const first_name = ref('');
const last_name = ref('');
const email = ref('');
const password = ref('');
const password_confirmation = ref('');
const account_type = ref('user');
const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
const errorMessages = ref([]);
const isLoading = ref(false);
const successMessage = ref('');

//methods
const resetForm = () => {
  first_name.value = '';
  last_name.value = '';
  email.value = '';
  password.value = '';
  password_confirmation.value = '';
  account_type.value = 'user';
};

const submitForm = async () => {
    try {
        isLoading.value = true;
        const response = await axios.post('user-register', {
            first_name: first_name.value,
            last_name: last_name.value,
            email: email.value,
            password: password.value,
            password_confirmation: password_confirmation.value,
            account_type: account_type.value,
        }, {
            headers: {
                'X-CSRF-TOKEN': csrfToken,
            },
        });

        successMessage.value = 'Register successful!';

        resetForm();

        //Redirect to
        setTimeout(() => {
            window.location.href = route('dashboard');
        }, 1000);

    } catch (error) {
        Helper.handleErrors(error, errorMessages);
    } finally {
        isLoading.value = false;
    }
};
</script>

<template>
	<!--wrapper-->
	<div class="wrapper">
		<div class="d-flex align-items-center justify-content-center my-5 my-lg-0">
			<div class="container">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2 mt-3">
					<div class="col mx-auto">
						
						<div class="card">
							<div class="card-body">
								<div class="border p-4 rounded">
									<div class="text-center">
										<h3 class="">{{$t('user.Sign Up')}}</h3>
										<p>{{$t('user.Already have an account?')}} <a :href="route('user-login')">{{$t('user.Login here')}}</a>
										</p>
									</div>

                                    <div v-if="errorMessages.length > 0" class="error-container">
                                        <div class="font-medium text-red-600">
                                            {{$t('Error! ') }}
                                        </div>

                                        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                                            <li v-for="error in errorMessages" :key="error">{{ error }}</li>
                                        </ul>
                                    </div>

         <!--                       <div class="d-grid">
                                        <a class="btn my-4 shadow-sm btn-white" href="javascript:;"> 
                                            <span class="d-flex justify-content-center align-items-center">
                                                <img class="me-2" src="assets/images/icons/search.svg" width="16" alt="Image Description">
                                                <span>Sign Up with Google</span>
                                            </span>
                                        </a> <a href="javascript:;" class="btn btn-facebook"><i class="bx bxl-facebook"></i>Sign Up with Facebook</a>
                                    </div>
                                    <div class="login-separater text-center mb-4"> <span>OR SIGN UP WITH EMAIL</span>
                                        <hr/>
                                    </div> -->

									<div class="form-body">
										<form class="row g-3" @submit.prevent="submitForm">
											<div class="col-sm-6">
												<label for="inputFirstName" class="form-label">{{$t('user.First Name')}}</label>
                                                <input v-model="first_name" class="form-control" type="text" name="first_name" placeholder="First Name" autofocus />
											</div>
											<div class="col-sm-6">
												<label for="inputLastName" class="form-label">{{$t('user.Last Name')}}</label>
												<input v-model="last_name" class="form-control" type="text" name="last_name" placeholder="Last Name" autofocus />
											</div>
											<div class="col-12">
												<label for="inputEmailAddress" class="form-label">{{$t('user.Email Address')}}</label>
												<input v-model="email" class="form-control" type="email" name="email" placeholder="Email" />
											</div>
											<div class="col-12">
												<label for="inputChoosePassword" class="form-label">{{$t('user.Password')}}</label>
												<div class="input-group" id="show_hide_password">
													<input v-model="password" class="form-control border-end-0" type="password" name="password" placeholder="Password" autocomplete="new-password" />
                                                    <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
												</div>
											</div>
                                            <div class="col-12">
												<label for="inputChoosePassword" class="form-label">{{$t('user.Confirm Password')}}</label>
												<div class="input-group" id="show_hide_password">
													<input v-model="password_confirmation" class="form-control border-end-0"  type="password" name="password_confirmation" placeholder="Confirm Password" />
                                                    <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
												</div>
											</div>
											<div class="col-12">
												<label for="inputSelectCountry" class="form-label">{{$t('user.Account Type')}}</label>
												
                                                <select v-model="account_type" class="form-control custom-select" name="account_type" id="inputSelectCountry" aria-label="Default select example">
                                                    <option value="user">{{$t('User') }}</option>
                                                </select>
											</div>
											
											<div class="col-12">
												<div class="d-grid">
                                                    <button class="btn btn-primary " type="submit">
                                                        <span v-if="isLoading">
                                                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                            {{$t('user.Loading...')}}
                                                        </span>
                                                        <span v-else><i class='bx bx-user'></i> {{$t('user.Sign Up')}}</span>
                                                    </button>

                                                    <div v-if="successMessage" class="alert alert-success">
                                                        {{ successMessage }}
                                                    </div>
												</div>
											</div>

                                            <div class="col-md-12 text-center">	
                                                <a :href="route('/')">{{$t('user.Back to site')}}</a>
 
											</div>

										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>
	</div>
	<!--end wrapper-->




</template>

<!-- resources/js/components/user/auth/CustomerLogin.vue -->
<script setup>

import { ref } from 'vue';
import axios from 'axios';
import { route } from 'routeHelper';

//variables
const email = ref('');
const password = ref('');
const account_type = ref('user');
const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
const errorMessages = ref([]);
const isLoading = ref(false);
const successMessage = ref('');


//methods
const resetForm = () => {
    email.value = '';
    password.value = '';
  };

const submitForm = async () => {
    try {
        isLoading.value = true;
        const response = await axios.post(route('user-login'), {
            email: email.value,
            password: password.value,
            account_type: account_type.value,
        }, {
            headers: {
                'X-CSRF-TOKEN': csrfToken,
            },
        });

        successMessage.value = 'Login successful!';

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
		<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
			<div class="container-fluid">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3 mt-5">
					<div class="col mx-auto">
						
						<div class="card">
							<div class="card-body">
								<div class="border p-4 rounded">
									<div class="text-center">
										<h3 class="">{{$t('user.Login')}}</h3>
										<p>{{$t('user.Don\'t have an account yet?')}} <a :href="route('user-register')">{{$t('user.Sign up here')}}</a>
										</p>
									</div>
                                    <br>
									<!-- <div class="d-grid">
										<a class="btn my-4 shadow-sm btn-white" href="javascript:;"> 
                                            <span class="d-flex justify-content-center align-items-center">
                                                <img class="me-2" :src="asset('frontend/assets/images/icons/search.svg')" width="16" alt="Image Description">
                                                <span>Sign in with Google</span>
											</span>
										</a> <a href="javascript:;" class="btn btn-facebook"><i class="bx bxl-facebook"></i>Sign in with Facebook</a>
									</div>
									<div class="login-separater text-center mb-4"> <span>OR SIGN IN WITH EMAIL</span>
										<hr/>
									</div> -->

                                    <div v-if="errorMessages.length > 0" class="text-center">
                                        <div class="font-medium text-red-600">
                                            {{ $t('Error!') }}
                                        </div>

                                        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                                            <li v-for="(error, index) in errorMessages" :key="index">{{ error }}</li>
                                        </ul>
                                    </div>

									<div class="form-body">
										<form class="row g-3" @submit.prevent="submitForm">
											<div class="col-12">
												<label for="inputEmailAddress" class="form-label">{{$t('user.Email Address')}}</label>
												<input v-model="email" class="form-control" type="text" name="email" placeholder="user@example.com" autofocus>
											</div>
											<div class="col-12">
												<label for="inputChoosePassword" class="form-label">{{$t('user.Enter Password')}}</label>
												<div class="input-group" id="show_hide_password">
													<input v-model="password" class="form-control" type="password" name="password" placeholder="123456789" autocomplete="current-password">
                                                    <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
												</div>
											</div>
											
											
											<div class="col-12">
												<div class="d-grid">
													
                                                    <button type="submit" class="btn btn-primary" :disabled="isLoading">
                                                        <span v-if="isLoading">
															<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
															{{$t('user.Logging in...')}}
														</span>
                                                        <span v-else>{{$t('user.Login')}} <i class="bx bxs-lock-open"></i></span>
                                                    </button>

                                                    <div v-if="successMessage" class="alert alert-success text-center mt-2">
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
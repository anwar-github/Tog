<template>
	<div class="container">

		<form-wizard title="Logique Test" @on-complete="onComplete" finish-button-text="Sign-in">
			<tab-content title="Personal details" :before-change="beforeTabSwitchStep2">

				<label class="label" for="firstName">First Name</label>
				<p :class="{ 'control': true }">
					<input class="form-control" v-model="firstName" v-validate="'required|alpha_spaces'"
						   :class="{'input': true, 'text-danger border border-danger': errors.has('firstName') }"
						   name="firstName" type="text" placeholder="First Name">
					<span v-show="errors.has('firstName')" class="help text-danger">{{ errors.first('firstName')
						}}</span>
				</p>

				<label class="label" for="lastName">Last Name</label>
				<p :class="{ 'control': true }">
					<input class="form-control" v-model="lastName" v-validate="'required|alpha_spaces'"
						   :class="{'input': true, 'text-danger border border-danger': errors.has('lastName') }"
						   name="lastName" type="text" placeholder="Last Name">
					<span v-show="errors.has('lastName')" class="help text-danger">{{ errors.first('lastName') }}</span>
				</p>

				<label class="label" for="email">Email</label>
				<p :class="{ 'control': true }">
					<input class="form-control" v-model="email" v-validate="'required|email'"
						   :class="{'input': true, 'text-danger border border-danger': errors.has('email') }"
						   name="email" type="text" placeholder="Email">
					<span v-show="errors.has('email')" class="help text-danger">{{ errors.first('email') }}</span>
				</p>

				<label class="label" for="password">Password</label>
				<p :class="{ 'control': true }">
					<input class="form-control" v-model="password" v-validate="'required|min_value:6'"
						   :class="{'input': true, 'text-danger border border-danger': errors.has('password') }"
						   name="password" type="password" placeholder="Password">
					<span v-show="errors.has('password')" class="help text-danger">{{ errors.first('password') }}</span>
				</p>

				<label class="label" for="confirm">Confirm Password</label>
				<p :class="{ 'control': true }">
					<input class="form-control" v-model="confirmPassword" v-validate="'confirmed:password'"
						   :class="{'input': true, 'text-danger border border-danger': errors.has('confirmPassword') }"
						   name="confirmPassword" type="password" placeholder="Confirm Password">
					<span v-show="errors.has('confirmPassword')"
						  class="help text-danger">{{ errors.first('confirmPassword') }}</span>
				</p>

				<div class="form-group">
					<input type="checkbox" aria-label="..." name="term" v-model="term" v-validate="'required'">
					Term Condition
					<span v-show="errors.has('term')" class="help text-danger">{{ errors.first('term') }}</span>
				</div>
			</tab-content>
			<tab-content title="Additional Info" :before-change="beforeTabSwitch">
				<div class="form-group">
					<label class="control-label">Address</label>
					<textarea required="required" class="form-control"
							  placeholder="Enter your address" name="address" v-model="address"></textarea>
				</div>

				<label class="label" for="date">Birth</label>
				<p :class="{ 'control': true }">
					<input class="form-control" v-model="date" v-validate="'required'"
						   :class="{'input': true, 'text-danger border border-danger': errors.has('date') }"
						   name="date" type="date" placeholder="Last Name">
					<span v-show="errors.has('date')" class="help text-danger">{{ errors.first('date') }}</span>
				</p>

				<div class="form-group">
					<label class="control-label">Member Type</label>
					<select class="form-control" name="type" v-model="type" v-validate="'required'"
							:class="{'input': true, 'text-danger border border-danger': errors.has('type') }">
						<option value="">Select Membership</option>
						<option value="1">Silver</option>
						<option value="2">Silver</option>
						<option value="3">Platinum</option>
						<option value="4">Black</option>
						<option value="5">VIP</option>
						<option value="6">VVIP</option>
					</select>
					<span v-show="errors.has('type')" class="help text-danger">{{ errors.first('type') }}</span>
				</div>
				<div class="card p-5">

					<label class="label" for="creditCard">Credit Card</label>
					<p :class="{ 'control': true }">
						<input class="form-control" v-model="creditCard" v-validate="'required|Credit_card'"
							   :class="{'input': true, 'text-danger border border-danger': errors.has('creditCard') }"
							   name="creditCard" type="text" placeholder="Credit Card">
						<span v-show="errors.has('creditCard')" class="help text-danger">{{ errors.first('creditCard') }}</span>
					</p>

					<label class="label" for="expirationYear">Expired Year</label>
					<p :class="{ 'control': true }">
						<input class="form-control" v-model="expirationYear"
							   v-validate="'required|digits:4|date_format:YYYY'"
							   :class="{'input': true, 'text-danger border border-danger': errors.has('expirationYear') }"
							   name="expirationYear" type="text" placeholder="Expired Year">
						<span v-show="errors.has('expirationYear')"
							  class="help text-danger">{{ errors.first('expirationYear') }}</span>
					</p>

					<label class="label" for="expirationYear">Expired Mounth</label>
					<p :class="{ 'control': true }">
						<input class="form-control" v-model="expiredMounth"
							   v-validate="'required|digits:2|date_format:MM'"
							   :class="{'input': true, 'text-danger border border-danger': errors.has('expiredMounth') }"
							   name="expiredMounth" type="text" placeholder="Expired Mounth">
						<span v-show="errors.has('expiredMounth')"
							  class="help text-danger">{{ errors.first('expiredMounth') }}</span>
					</p>

					<label class="label" for="cvc">CVC</label>
					<p :class="{ 'control': true }">
						<input class="form-control" v-model="cvc" v-validate="'required|numeric'"
							   :class="{'input': true, 'text-danger border border-danger': errors.has('cvc') }"
							   name="cvc" type="text" placeholder="CVC">
						<span v-show="errors.has('cvc')" class="help text-danger">{{ errors.first('cvc') }}</span>
					</p>

				</div>


			</tab-content>
			<tab-content title="Last step">
				<template v-if="auth === true">
					<div class="alert-success p-5">Success Login, {{ user }}</div>
				</template>
				<template v-if="auth === false">
					<div class="card p-5">
						<div class="alert-success p-2 text-capitalize text-center"> Register Success </div>
						<spa class="text-muted">Silahkan melakukan login . . .</spa>

						<label class="label" for="emailAuth">Email</label>
						<p :class="{ 'control': true }">
							<input class="form-control" v-model="emailAuth" v-validate="'required|email'"
								   :class="{'input': true, 'text-danger border border-danger': errors.has('emailAuth') }"
								   name="emailAuth" type="text" placeholder="Email">
							<span v-show="errors.has('emailAuth')" class="help text-danger">{{ errors.first('emailAuth')
								}}</span>
						</p>

						<label class="label" for="passwordAuth">Password</label>
						<p :class="{ 'control': true }">
							<input class="form-control" v-model="passwordAuth" v-validate="'required'"
								   :class="{'input': true, 'text-danger border border-danger': errors.has('passwordAuth') }"
								   name="passwordAuth" type="password" placeholder="Password">
							<span v-show="errors.has('passwordAuth')"
								  class="help text-danger">{{ errors.first('passwordAuth')
								}}</span>
						</p>
					</div>
				</template>
			</tab-content>
		</form-wizard>

	</div>
</template>

<script>
    var Vue = require('vue');

    //global registration
    import VueFormWizard from 'vue-form-wizard'
    import 'vue-form-wizard/dist/vue-form-wizard.min.css'

    import VeeValidate from 'vee-validate';

    Vue.use(VeeValidate);
    Vue.use(VueFormWizard);

    //local registration
    import {FormWizard, TabContent} from 'vue-form-wizard'
    import 'vue-form-wizard/dist/vue-form-wizard.min.css'
    export default {
        components: {
            FormWizard,
            TabContent
        },
        data() {
            return {
                error: '',
                firstName: '',
                lastName: '',
                email: '',
                password: '',
                confirmPassword: '',
                term: '',
                address: '',
                date: '',
                type: '',
                creditCard: '',
                user: '',
                expiredMounth: '',
                expirationYear: '',
                cvc: '',
                emailAuth: '',
                passwordAuth: '',
				auth: false
            }
        },
        methods: {
            async beforeTabSwitchStep2 () {
                return this.$validator.validateAll(['firstName', 'lastName', 'password', 'term', 'email']).then((result) => {
                    if (result) {
                        return true;
                    }

                    alert('Correct them errors!');
                    return false
                });
            },
            async beforeTabSwitch () {

                var __self = this;

                return await this.$validator.validateAll(['expiration_month', 'expiration_year', 'cvc', 'type', 'address', 'date']).then((result) => {
                    if (result) {

                        let input = {
                            "first_name": this.firstName,
                            "last_name": this.lastName,
                            "date": this.date,
                            "password": this.password,
                            "type": this.type,
                            "address": this.address,
                            "cc": this.creditCard,
                            "confirmed": this.confirmPassword,
                            "term": this.term,
                            "email": this.email,
                            "expiration_year": this.expirationYear,
                            "expiration_month": this.expiredMounth,
                            "cvc": this.cvc
                        };

                        return axios.post("http://belajar.local/api/sign-up", input, {header: {"Content-Type": "application/json"}}).then(function (response) {
                            __self.user = response.data;
                            return true;
                        }).catch(function (error) {
                            __self.errors = error.response.data.errors;
                        });
                    }

                    alert('Correct them errors!');
                    return false
                });

            },
            async onComplete () {

                return await this.$validator.validateAll(['emailAuth', 'passwordAuth']).then((result) => {

                    var __self = this;

                    if (result) {

                        let input = {
                            "email": this.emailAuth,
                            "password": this.passwordAuth
                        };

                        return axios.post("http://belajar.local/api/sign-in", input, {header: {"Content-Type": "application/json"}}).then(function (response) {
                            __self.user = response.data;
                            this.auth = true;
                            if (__self.user) {
                                return true;
                            }
                        }).catch(function (error) {
                            __self.errors = error.response.data.errors;
                        });
                    }

                    return false
                });
            }
        }
    }
</script>

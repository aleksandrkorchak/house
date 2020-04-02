<template>
    <div class="card col-6 my-3">
        <div class="card-header row justify-content-center">
            Поиск дома
        </div>
        <div class="card-body">

            <form class="needs-validation" novalidate @submit.prevent="sendRequest">

                <div class="form-row my-3">
                    <div class="col-md-12 col-lg-6">
                        <name ref="name"
                              v-model="form.name"
                              :v="$v.form.name"
                        ></name>
                    </div>
                </div>

                <div class="form-row mt-3">
                    <div class="col-md-12">
                        <price ref="price"
                               @input="price($event)"
                               :v="$v.form.price"
                        ></price>
                    </div>
                </div>

                <div class="form-row">

                    <div class="col-md-12 col-lg-6">
                        <room ref="bedroom"
                              id="bedroom"
                              text="Спальни"
                              v-model="form.bedroom"
                              :v="$v.form"
                        ></room>
                    </div>

                    <div class="col-md-12 col-lg-6">
                        <room ref="bathroom"
                              id="bathroom"
                              text="Ванные"
                              v-model="form.bathroom"
                              :v="$v.form"
                        ></room>
                    </div>

                </div>


                <div class="form-row">

                    <div class="col-md-12 col-lg-6">
                        <room ref="storey"
                              id="storey"
                              text="Этажи"
                              v-model="form.storey"
                              :v="$v.form"
                        ></room>
                    </div>

                    <div class="col-md-12 col-lg-6">
                        <room ref="garage"
                              id="garage"
                              text="Гаражи"
                              v-model="form.garage"
                              :v="$v.form"
                        ></room>
                    </div>

                </div>

                <div class="d-flex justify-content-center col-12 px-0 mt-3">
                    <button
                        class="btn btn-primary btn-block col-8  col-sm-5 col-lg-4 col-xl-3"
                        type="submit"
                        :disabled="search || this.$v.$invalid"
                    >
                        <span
                            class="spinner-border spinner-border-sm"
                            role="status"
                            aria-hidden="true"
                            v-if="search"
                        >
                        </span>
                        Поиск<span v-if="search">...</span>
                    </button>
                </div>


            </form>


        </div>
    </div>
</template>

<script>

    import Room from "./SearchForm/Room";
    import Price from "./SearchForm/Price";
    import Name from "./SearchForm/Name";
    import {currency, extAlphaNum, minLessEqualMax} from "../validators";
    import {maxValue, maxLength, minLength, numeric} from "vuelidate/lib/validators";

    export default {
        name: "SearchForm",
        data() {
            return {
                search: false,
                form: {
                    name: '',
                    price: {
                        min: '',
                        max: ''
                    },
                    bedroom: '',
                    bathroom: '',
                    storey: '',
                    garage: ''
                },
            }
        },
        components: {
            room: Room,
            price: Price,
            name: Name
        },


        validations: {
            form: {
                name: {
                    extAlphaNum,
                    minLength: minLength(3),
                    maxLength: maxLength(15)
                },

                price: {
                    min: {
                        currency
                    },
                    max: {
                        currency,
                        minLessEqualMax
                    }
                },

                bedroom: {
                    numeric,
                    maxValue: maxValue(10)
                },

                bathroom: {
                    numeric,
                    maxValue: maxValue(10)
                },

                storey: {
                    numeric,
                    maxValue: maxValue(10)
                },

                garage: {
                    numeric,
                    maxValue: maxValue(10)
                }


            },
        },

        methods: {

            price(event) {
                switch (event.target.id) {
                    case 'min':
                        this.form.price.min = event.target.value;
                        break;
                    case 'max':
                        this.form.price.max = event.target.value;
                        break;
                }
            },


            /**
             * Send ajax request
             */
            sendRequest() {

                this.$store.state.errors = null;

                this.search = true;
                const formData = new FormData();
                formData.append('name', this.form.name);
                formData.append('priceMin', this.form.price.min);
                formData.append('priceMax', this.form.price.max);
                formData.append('bedroom', this.form.bedroom);
                formData.append('bathroom', this.form.bathroom);
                formData.append('storey', this.form.storey);
                formData.append('garage', this.form.garage);

                axios.post('/ajax', formData)
                    .then((response) => {
                        this.$store.state.houses = response.data;
                    })
                    .catch((error) => {
                        if (error.response) {
                            if (error.response.data.errors) {
                                this.$store.state.errors = error.response.data.errors;
                            } else {
                                this.$store.state.errors = error.response.data.message
                            }
                        } else if (error.request) {
                            this.$store.state.errors = error;
                        } else {
                            this.$store.state.errors = error.message;
                        }
                    })
                    .then(() => {
                        this.search = false
                    });
            },

        },


    }
</script>

<style scoped>

</style>

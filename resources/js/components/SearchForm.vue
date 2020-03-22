<template>
    <div class="card col-6 my-3">
        <div class="card-header row justify-content-center">
            Поиск дома
        </div>
        <div class="card-body">

            <form class="needs-validation" novalidate @submit.prevent="sendRequest">
<!--            <form method="post" action="/test" class="needs-validation" novalidate>-->

<!--                <input type="hidden" name="_token" id="csrf-token"-->
<!--                       :value="csrf" />-->

                <div class="form-row my-3">
                    <div class="col-md-12 col-lg-6">
                        <name ref="name"></name>
                    </div>
                </div>

                <div class="form-row mt-3">
                    <div class="col-md-12">
                        <price ref="price"></price>
                    </div>
                </div>

                <div class="form-row">

                    <div class="col-md-12 col-lg-6">
                        <room ref="bedroom" id="bedroom" text="Спальни"></room>
                    </div>

                    <div class="col-md-12 col-lg-6">
                        <room ref="bathroom" id="bathroom" text="Ванные"></room>
                    </div>

                </div>


                <div class="form-row">

                    <div class="col-md-12 col-lg-6">
                        <room ref="storey" id="storey" text="Этажи"></room>
                    </div>

                    <div class="col-md-12 col-lg-6">
                        <room ref="garage" id="garage" text="Гаражи"></room>
                    </div>

                </div>

                <div class="d-flex justify-content-center col-12 px-0 mt-3">
                    <button
                        class="btn btn-primary btn-block col-8  col-sm-5 col-lg-4 col-xl-3"
                        type="submit"
                        :disabled="search"
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

    export default {
        name: "SearchForm",
        data() {
            return {
                search: false,
                // csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        },
        components: {
            room: Room,
            price: Price,
            name: Name
        },
        methods: {
            sendRequest() {
                this.search = true;
                const formData = new FormData();
                formData.append('name', this.$refs.name.name);
                formData.append('priceMin', this.$refs.price.priceMin);
                formData.append('priceMax', this.$refs.price.priceMax);
                formData.append('bedroom', this.$refs.bedroom.name);
                formData.append('bathroom', this.$refs.bathroom.name);
                formData.append('storey', this.$refs.storey.name);
                formData.append('garage', this.$refs.garage.name);

                // console.log(formData.getAll('priceMin'));
                // console.log(formData.getAll('priceMax'));
                // console.log(formData.getAll('bedroom'));

                axios.defaults.headers.common['X-CSRF-TOKEN'] =
                    document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                axios.post('/ajax', formData)
                    .then((response) => {
                        // console.log(response.data);
                        this.$store.state.houses = response.data;
                        // console.log(this.$store.state.houses)
                    })
                    .catch(function (error) {
                        console.log(error)
                    })
                    .then(() => {
                        console.log('Response anyway');
                        this.search = false
                    });
            },
            send() {

            }
        }
    }
</script>

<style scoped>

</style>

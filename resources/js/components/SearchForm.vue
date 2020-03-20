<template>
    <div class="card col-6 my-3">
        <div class="card-header row justify-content-center">
            Поиск дома
        </div>
        <div class="card-body">

            <form class="needs-validation" novalidate @submit.prevent="sendRequest">
                <div class="form-row my-3">
                    <div class="col-md-12 col-lg-6">
                        <name></name>
                    </div>
                </div>

                <div class="form-row mt-3">
                    <div class="col-md-12">
                        <price></price>
                    </div>
                </div>

                <div class="form-row">

                    <div class="col-md-12 col-lg-6">
                        <room id="bedroom" text="Спальни"></room>
                    </div>

                    <div class="col-md-12 col-lg-6">
                        <room id="bathroom" text="Ванные"></room>
                    </div>

                </div>


                <div class="form-row">

                    <div class="col-md-12 col-lg-6">
                        <room id="storey" text="Этажи"></room>
                    </div>

                    <div class="col-md-12 col-lg-6">
                        <room id="garage" text="Гаражи"></room>
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
                search: false
            }
        },
        components: {
            room: Room,
            price: Price,
            name: Name
        },
        methods: {
            sendRequest() {
                // console.log('Send request!!!');
                this.search = true;
                const formData = new FormData();

                axios.get('/ajax')
                    .then(function (response) {
                        console.log(response)
                    })
                    .catch(function (error) {
                        console.log(error)
                    })
                    .then(() => {
                        console.log('Response anyway')
                        this.search = false
                    });
            }
        }
    }
</script>

<style scoped>

</style>

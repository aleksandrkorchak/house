<template>
    <table class="table table-bordered">
        <thead class="thead-light">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Имя</th>
            <th scope="col">Цена</th>
            <th scope="col">Спальни</th>
            <th scope="col">Ванные</th>
            <th scope="col">Этажи</th>
            <th scope="col">Гаражи</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="(house, index) in houses" >
            <th scope="row">{{ index + 1 }}</th>
            <td>{{ house.name }}</td>
            <td>{{ house.price }}</td>
            <td>{{ house.bedrooms }}</td>
            <td>{{ house.bathrooms }}</td>
            <td>{{ house.storeys }}</td>
            <td>{{ house.garages }}</td>
        </tr>
        </tbody>
    </table>
</template>

<script>
    export default {
        name: "ResultTable",
        // data() {
        //     return {
        //         houses: this.$store.state.houses
        //     }
        // },
        // watch: {
        //     houses: function () {
        //         console.log('houses changed!!!')
        //     }
        // },
        computed: {
            houses () {
                // console.log(this.$store.state.houses);
                return this.$store.state.houses
            }
        }
    }
</script>

<style scoped>

</style>

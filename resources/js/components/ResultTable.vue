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

        <tr v-if="houses === null" class="text-center">
            <td colspan="7">Пусто</td>
        </tr>
        <tr v-else-if="houses.length === 0" class="text-center">
            <td colspan="7">По запросу ничего не найдено</td>
        </tr>
        <template v-else-if="houses.length > 0">
            <tr v-for="(house, index) in houses">
                <th scope="row">{{ index + 1 }}</th>
                <td>{{ house.name }}</td>
                <td>{{ house.price }}</td>
                <td>{{ house.bedrooms }}</td>
                <td>{{ house.bathrooms }}</td>
                <td>{{ house.storeys }}</td>
                <td>{{ house.garages }}</td>
            </tr>
        </template>


        </tbody>

    </table>


</template>

<script>
    export default {
        name: "ResultTable",
        computed: {
            houses() {
                return this.$store.state.houses
            }
        }
    }
</script>

<style scoped>

</style>

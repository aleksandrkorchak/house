<template>
    <div class="container">
        <div class="d-flex justify-content-center row">
            <app-search-form></app-search-form>
        </div>
        <div class="row">
            <app-result-table></app-result-table>
        </div>
    </div>
</template>

<script>
    import SearchForm from "./SearchForm";
    import ResultTable from "./ResultTable";

    export default {
        name: "App",

        components: {
            appSearchForm: SearchForm,
            appResultTable: ResultTable
        }
    }
</script>

<style scoped>
    .container {
        min-width: 400px;
    }
</style>

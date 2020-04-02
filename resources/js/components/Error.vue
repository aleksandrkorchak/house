<template>

    <div
        v-if="typeof($store.state.errors) === 'object'"
        class="alert w-50 p-0"
        role="alert"
    >

        <ul class="list-group">
            <li v-for="(field, name) in $store.state.errors" class="list-group-item list-group-item-danger">
                <div v-for="error in field">
                    {{ error }}
                </div>
            </li>
        </ul>

    </div>
    <div class="alert alert-danger w-50"
         v-else-if="$store.state.errors"
    >
        {{ $store.state.errors }}
    </div>

</template>

<script>
    export default {
        name: "Error",
        methods: {}
    }
</script>

<style scoped>

</style>

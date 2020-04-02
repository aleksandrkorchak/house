<template>
    <div class="input-group mt-3">
        <div class="d-none d-md-block">
            <div class="input-group-prepend d-block">
                <span class="input-group-text">{{ text }}</span>
            </div>
        </div>
        <label :for="id" class="d-md-none col-lg-12 px-0 mb-0">{{ text }}</label>
        <input
            type="text"
            class="form-control"
            :class="{'is-invalid': v[id].$error}"
            :id="id"
            placeholder="количество"
            v-model.number="v[id].$model"
        >

        <div
            class="invalid-feedback"
            v-if="!v[id].numeric"
        >
            Поле может быть числом (0,1,2..) или пустой строкой
        </div>
        <div
            class="invalid-feedback"
            v-else-if="!v[id].maxValue"
        >
            Значение поля должно быть <= 10
        </div>



    </div>
</template>

<script>

    export default {
        props: {
            id: {
                type: String,
                required: true
            },
            text: {
                type: String,
                required: true
            },
            v: {
                type: Object,
                required: true
            },
            value: {
                default: ''
            }
        },

        computed: {

        },

        methods: {}
    }
</script>

<style scoped>
    div.invalid-feedback {
        width: 100%;
    }
</style>

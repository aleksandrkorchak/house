<template>
    <div class="input-group">
        <div class="d-none d-md-block">
            <div class="input-group-prepend d-block">
                <span class="input-group-text">Цена</span>
            </div>
        </div>

        <label for="min" class="d-md-none col-lg-12 px-0 mb-0">Цена</label>
        <input
            type="text"
            class="form-control col-md-12 mr-2"
            :class="{'is-invalid': v.min.$error}"
            id="min"
            placeholder="min"
            @input="touchInput($event)"
        >

        <label for="max"></label>
        <input
            type="text"
            class="form-control col-md-12"
            :class="{'is-invalid': v.max.$error}"
            id="max"
            placeholder="max"
            @input="touchInput($event)"
        >

        <div
            class="invalid-feedback"
            v-if="!v.min.currency"
        >
            Минимальная цена должна быть числом >= 0
        </div>
        <div
            class="invalid-feedback"
            v-if="!v.max.currency"
        >
            Максимальная цена должна быть числом >= 0
        </div>
        <div
            class="invalid-feedback"
            v-if="!v.max.minLessEqualMax"
        >
            Минимальная цена должна быть меньше максимальной
        </div>


    </div>
</template>

<script>

    export default {
        name: "Price",

        props: {
            value: {
                type: String,
                default: ''
            },
            v: {
                type: Object,
                required: true
            }
        },

        methods: {
            touchInput(event) {
                this.v.$touch();
                this.$emit('input', event);
            }
        },

    }
</script>

<style scoped>
    div.invalid-feedback {
        width: 100%;
    }
</style>

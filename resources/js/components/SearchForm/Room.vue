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
            :class="{'is-invalid': $v.name.$error}"
            :id="id"
            placeholder="количество"
            v-model.number="$v.name.$model"
        >
        <div
            class="invalid-feedback"
            v-if="!$v.name.numeric"
        >
            Поле может быть числом (0,1,2..) или пустой строкой
        </div>
        <div
            class="invalid-feedback"
            v-else-if="!$v.name.maxValue"
        >
            Значение поля должно быть <= 10
        </div>
    </div>
</template>

<script>
    import {maxValue, numeric} from "vuelidate/lib/validators";

    export default {
        props: [
            'id',
            'text'
        ],
        data() {
            return {
                name: ''
            }
        },
        validations: {
            name: {
                numeric,
                maxValue: maxValue(10)
            }
        },
        methods: {}
    }
</script>

<style scoped>
    div.invalid-feedback {
        width: 100%;
    }
</style>

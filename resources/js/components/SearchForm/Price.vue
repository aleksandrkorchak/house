<template>
    <div class="input-group">
        <div class="d-none d-md-block">
            <div class="input-group-prepend d-block">
                <span class="input-group-text">Цена</span>
            </div>
        </div>

        <label for="priceMin" class="d-md-none col-lg-12 px-0 mb-0">Цена</label>
        <input
            type="number"
            class="form-control col-md-12 mr-2"
            :class="{'is-invalid': $v.priceMin.$error}"
            id="priceMin"
            placeholder="min"
            v-model.number="$v.priceMin.$model"
        >

        <label for="priceMax"></label>
        <input
            type="number"
            class="form-control col-md-12"
            :class="{'is-invalid': $v.priceMax.$error}"
            id="priceMax"
            placeholder="max"
            v-model.number="$v.priceMax.$model"
        >
        <div
            class="invalid-feedback"
            v-if="!$v.priceMin.currency"
        >
            Минимальная цена должна быть числом >= 0
        </div>
        <div
            class="invalid-feedback"
            v-if="!$v.priceMax.currency"
        >
            Максимальная цена должна быть числом >= 0
        </div>
        <div
            class="invalid-feedback"
            v-if="!$v.priceMax.minLessEqualMax"
        >
            Минимальная цена должна быть меньше максимальной
        </div>
    </div>
</template>

<script>
    import {currency, minLessEqualMax} from "../../validators";

    export default {
        name: "Price",

        data() {
            return {
                priceMin: '',
                priceMax: ''
            }
        },
        validations: {
            priceMin: {
                currency
            },
            priceMax: {
                currency,
                minLessEqualMax
            }
        }
    }
</script>

<style scoped>
    div.invalid-feedback {
        width: 100%;
    }
</style>

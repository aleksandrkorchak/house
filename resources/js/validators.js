import {helpers} from "vuelidate/lib/validators";

export const extAlphaNum = helpers.regex('extAlphaNum', /^[\-a-zA-Z0-9а-яА-Я ]*$/);

export const currency = helpers.regex('currency', /^(0|[1-9]\d*)(\.\d{1,2})?$/);

export const minLessEqualMax = (value, vm) =>
{
    return !helpers.req(value) || vm.min <= value;
};


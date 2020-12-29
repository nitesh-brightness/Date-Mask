import Inputmask from 'inputmask';

export default {
    bind(el, binding) {
        Inputmask({
            alias: 'datetime',
            inputFormat: 'mm/dd/yyyy',
            placeholder: '__/__/____',
            digitsOptional: true,
            shiftPositions: false,
            skipOptionalPartCharacter: " ",
            onBeforePaste() {
                return false;
            }
        }).mask(el);
    },

    unbind(el) {
        Inputmask.remove(el);
    }
}

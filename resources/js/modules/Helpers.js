export default class {
    static enToFa(value, split = false) {
        return split
                    ? new Number(value).toLocaleString('fa-ir')
                    : new Number(value).toLocaleString('fa-ir').replaceAll('٬', '')
    }
}
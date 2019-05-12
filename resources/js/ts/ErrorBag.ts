export default class ErrorBag {
    public errors: any[]
    constructor(errors = []) {
        this.setErrors(errors)
    }

    hasErrors() {
        return !!this.keys.length
    }

    get keys() {
        return Object.keys(this.errors)
    }

    hasError(key: string) {
        return this.keys.indexOf(key) > -1
    }

    firstKey() {
        return this.keys[0]
    }

    first(key: string) {
        return this.errors[key] ? this.errors[key][0] : undefined
    }

    setErrors(errors) {
        if (errors) {
            this.errors = errors
            for (const key in errors) {
                if (errors.hasOwnProperty(key)) {
                    const element = $(`[name^="${key.split('.')[0]}"]`)
                    if (element) {
                        element.focus()
                    } else {
                        $(`#${key}`).focus()
                    }
                    break
                }
            }
        }
    }

    moodleErrorMessage() {
        if (this.hasError('message')) {
            return this.first('message')
        } else {
            return ''
        }
    }

    clearAll() {
        this.setErrors({})
    }

    clear(key) {
        return delete this.errors[key]
    }
}

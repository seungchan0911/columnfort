const changeInput = document.querySelector("#change")
const form = document.querySelector("form")
const formContainer = document.querySelector(".form-container")
const formImg = document.querySelector(".form-img")
const formError = document.querySelector(".form-error")

let second = 500

if (window.innerWidth <= 750)
    second = 0

// 이거 엄청 힘들게 구현한 미친 기능입니다. 정말로... sign up form으로 바뀌었을 때, sign up에 실패하면 새로고침이 됩니다. 그럴 경우에 다시 sign in form으로 돌아가면 매우 어색해집니다.
// 그렇기에 sign up에 실패했을 때, 실패를 감지해야 합니다. AuthController.php에서 실패를 감지하고, auth.blade.php에서 blade문법으로 js로 실패 여부를 전송하게 했습니다.
// 실패일 경우에만 자연스럽게, sign up form이 처음 나타나는 상태, requestAnimationFrame() 함수 중첨 사용으로 transition 없이 transform으로 이미 이동된 상태를 가지게 되는 것입니다.
formImg.style.transition = "none"
formContainer.style.transition = "none"
requestAnimationFrame(() => {
    requestAnimationFrame(() => {
        formImg.style.transition = ""
        formContainer.style.transition = ""
    })
})

if (window.formErrors && window.formErrors.length > 0) {
    const errorDiv = document.createElement("div")
    const ul = document.createElement("ul")
    
    window.formErrors.forEach(msg => {
        const li = document.createElement("li")
        li.textContent = msg
        ul.appendChild(li)
    })

    errorDiv.appendChild(ul)
    formError.prepend(errorDiv)
}

if (window.formType === 'register') {
    if (window.registerFailed) {
        form.action = "/register"
        formContainer.innerHTML = `
            <input type="hidden" name="form_type" value="register">
            <div class="form-start">
                <h1>Create account</h1>
                <div class="input-group">
                    <input type="text" name="username" placeholder="username" autocomplete="off" required>
                    <input type="text" name="user_id" placeholder="user_id" autocomplete="off" required>
                    <input type="password" name="password" placeholder="password" autocomplete="off" required>
                    <input type="text" name="phone_number" placeholder="phone_number" autocomplete="off" required>
                    <input type="text" name="email" placeholder="email" autocomplete="off" required>
                </div>
                <button type="submit">Sign up</button>
            </div>
            <div class="form-error"></div>
            <div class="form-end">
                <label for="change">Are you ready for Sign in?</label>
            </div>
        `
        const formError = document.querySelector(".form-error")
        if (window.formErrors && window.formErrors.length > 0) {
            const errorDiv = document.createElement("div")
            const ul = document.createElement("ul")

            window.formErrors.forEach(msg => {
                const li = document.createElement("li")
                li.textContent = msg
                ul.appendChild(li)
            })

            errorDiv.appendChild(ul)
            formError.prepend(errorDiv)
        }
        changeInput.checked = true
    }
}

changeInput.addEventListener("change", () => {
    setTimeout(() => {
        if (changeInput.checked) {
            form.action = "/register"
            formContainer.innerHTML = `
                <input type="hidden" name="form_type" value="register">
                <div class="form-start">
                    <h1>Create account</h1>
                    <div class="input-group">
                        <input type="text" name="username" placeholder="username" autocomplete="off" required>
                        <input type="text" name="user_id" placeholder="user_id" autocomplete="off" required>
                        <input type="password" name="password" placeholder="password" autocomplete="off" required>
                        <input type="text" name="phone_number" placeholder="phone_number" autocomplete="off" required>
                        <input type="text" name="email" placeholder="email" autocomplete="off" required>
                    </div>
                    <button type="submit">Sign up</button>
                </div>
                <div class="form-end">
                    <label for="change">Are you ready for Sign in?</label>
                </div>
            `
        } else {
            form.action = "/login"
            formContainer.innerHTML = `
                <input type="hidden" name="form_type" value="login">
                <div class="form-start">
                    <h1>Sign in</h1>
                    <div class="input-group">
                        <input type="text" name="user_id" placeholder="user_id" autocomplete="off" required>
                        <input type="password" name="password" placeholder="password" autocomplete="off" required>
                    </div>
                    <button type="submit">Sign in</button>
                </div>
                <div class="form-end">
                    <label for="change">Don't have an account?</label>
                </div>
            `
        }

        changeInput.disabled = false
    }, second)
})

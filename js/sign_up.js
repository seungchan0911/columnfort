const changeInput = document.querySelector("#change")
const form = document.querySelector(".form")

changeInput.addEventListener("change", () => {
    changeInput.disabled = true;

    setTimeout(() => {
        if (changeInput.checked) {
            form.innerHTML = `
                <div class="form-start">
                    <h1>Create Account</h1>
                    <div class="input-group">
                        <input type="text" name="username" placeholder="username" autocomplete="off">
                        <input type="text" name="id" placeholder="id" autocomplete="off">
                        <input type="password" name="password" placeholder="password" autocomplete="off">
                        <input type="text" name="phone_number" placeholder="phone_number" autocomplete="off">
                        <input type="text" name="email" placeholder="email" autocomplete="off">
                    </div>
                </div>
                <div class="form-end">
                    <button>Sign up</button>
                    <label for="change">Are you ready for Sign in?</label>
                </div>
            `
        } else {
            form.innerHTML = `
                <div class="form-start">
                    <h1>Sign in</h1>
                    <div class="input-group">
                        <input type="text" name="id" placeholder="id" autocomplete="off">
                        <input type="password" name="password" placeholder="password" autocomplete="off">
                    </div>
                </div>
                <div class="form-end">
                    <button>Sign in</button>
                    <label for="change">Don't have an account?</label>
                </div>
            `
        }

        changeInput.disabled = false;
    }, 500)
})

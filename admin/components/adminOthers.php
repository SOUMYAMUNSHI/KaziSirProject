<div class="d-flex gap-5">
    <div>
        <p class="m-0 text-primary text-center">Logout</p>
    <button type="button" class="btn btn-danger d-flex p-3 mt-1">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M8 0a4 4 0 0 1 4 4v2.05a2.5 2.5 0 0 1 2 2.45v5a2.5 2.5 0 0 1-2.5 2.5h-7A2.5 2.5 0 0 1 2 13.5v-5a2.5 2.5 0 0 1 2-2.45V4a4 4 0 0 1 4-4m0 1a3 3 0 0 0-3 3v2h6V4a3 3 0 0 0-3-3"></path>
        </svg>
    </button>
    </div>

    <div class="d-flex flex-column text-center">
        <p class="m-0 text-primary">Change admin Password</p>
        <button type="button" class="btn btn-success d-flex p-3 mt-1 align-self-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key-fill" viewBox="0 0 16 16">
            <path d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2M2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
            </svg>
        </button>
    </div>

    <div class="d-flex flex-column text-center">
        <p class="m-0 text-primary">Change user Password</p>
        <button type="button" class="btn btn-primary d-flex p-3 mt-1 align-self-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key-fill" viewBox="0 0 16 16">
            <path d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2M2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
            </svg>
        </button>
    </div>
</div>

<div class="d-flex flex-column gap-2 p-2">
    <label for="old_password" class="text-primary">Enter old password</label>
    <input type="text" id="old_password">
    <label for="new_password" class="text-primary">Enter new password</label>
    <input type="text" id="new_password">
    <button type="submit" class="btn btn-success align-self-center">Change Password</button>
</div>
<h1>{{ config('site.title') }}</h1>
<h4>Hello, Thank you for joining {{ config('site.title') }}</h4>
<p>Your just one step away from making it official</p>
<p>Simply click the following link to <a href="{{ route('reg.email.verify', $email_token) }}">Verify</a> your account.</p>
<p>
    If you <stromg>did not request this change</stromg> just <strong>ignore this request</strong> and <strong>delete
        this email</strong>.
</p>
<p>
    No further action is required from you.
</p>
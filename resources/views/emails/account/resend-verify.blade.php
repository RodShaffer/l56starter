<h1>{{ config('site.title') }}</h1>
<h4>As per your request, the {{ config('site.title') }} account verification link.</h4>
Please click the following link to <a href="{{ route('reg.email.verify', $email_token) }}">Verify</a> your
account.
<p>
    If you <stromg>did not request this change</stromg> just <strong>ignore this request</strong> and <strong>delete
        this email</strong>.
</p>
<p>
    No further action is required from you.
</p>
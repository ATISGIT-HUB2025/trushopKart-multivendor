@extends('frontend.dashboard.layouts.master')

@section('title')
{{$settings->site_name}} || Product
@endsection

@section('content')
  <!--=============================
    DASHBOARD START
  ==============================-->
  <section id="wsus__dashboard">
    <div class="container-fluid">
        @include('frontend.dashboard.layouts.sidebar')

      <div class="row">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
          <div class="dashboard_content mt-2 mt-md-0">
          <ul class="nav nav-tabs" id="referralTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button
            class="nav-link active"
            id="step1-tab"
            data-bs-toggle="tab"
            data-bs-target="#step1"
            type="button"
            role="tab"
          >
            1. Invite Friends
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button
            class="nav-link"
            id="step2-tab"
            data-bs-toggle="tab"
            data-bs-target="#step2"
            type="button"
            role="tab"
          >
            2. Referral History
          </button>
        </li>
        <!--<li class="nav-item" role="presentation">-->
        <!--  <button-->
        <!--    class="nav-link"-->
        <!--    id="step3-tab"-->
        <!--    data-bs-toggle="tab"-->
        <!--    data-bs-target="#step3"-->
        <!--    type="button"-->
        <!--    role="tab"-->
        <!--  >-->
        <!--    3. Redeem Points-->
        <!--  </button>-->
        <!--</li>-->
      </ul>

      <div class="tab-content mt-3" id="referralTabContent">
        <!-- Step 1: Invite Friends -->

        @php
          $PerReferral = App\Models\GeneralSetting::first();
        @endphp

        <div class="tab-pane fade show active" id="step1" role="tabpanel">
          <p class="orange-highlight">
            Earn {{ $PerReferral->refer_points ?? 0 }} points when your friend joins via your link!
          </p>
          <div class="mb-4">
            <label for="emailInput" class="form-label fw-semibold"
              >Invite via Email</label
            >
        <form method="POST" action="{{ route('user.send.referral') }}">
  @csrf
  <div class="input-group mb-3">
    <input
      type="email"
      name="email"
      class="form-control radius-0"
      id="emailInput"
      placeholder="Email address"
      required
    />
    <input
      type="hidden"
      name="referral_link"
      value="{{ url('') }}/login?ref={{ Auth::user()->refer_code }}"
    />
    <button class="btn btn-secondary" id="sendButton" disabled>Send</button>
  </div>
</form>

          </div>
         <div class="input-group mb-4">
  <input
    type="text"
    class="form-control referral-link"
    readonly
    value="{{ url('') }}/login?ref={{ Auth::user()->refer_code }}"
  />
  <button
    class="btn btn-primary btn-copy"
    style="background: #023364"
    onclick="copyReferralLink(this)"
  >
    Copy Link
  </button>
</div>

  <button class="btn btn-primary" id="shareBtn" class="">📤 Share Now</button>

<!-- Optional: Alert message -->
<div id="copyAlert" style="display: none; color: green; margin-bottom: 10px;">
  Link copied to clipboard!
</div>

          {{-- <div class="d-flex gap-3 flex-wrap">
            <a
              href="https://api.whatsapp.com/send?text=https://checkyourweb.site/"
              target="_blank"
              class="social_icon"
            >
              <img
                src="https://img.icons8.com/ios-filled/50/25D366/whatsapp.png"
                alt="WhatsApp"
                width="20"
              />
            </a>
            <a
              href="https://www.instagram.com/YOUR_USERNAME/"
              target="_blank"
              class="social_icon"
            >
              <img
                src="https://img.icons8.com/ios-filled/50/E4405F/instagram-new.png"
                alt="Instagram"
                width="20"
              />
            </a>
            <a
              href="https://www.linkedin.com/sharing/share-offsite/?url=https://checkyourweb.site/"
              target="_blank"
              class="social_icon"
            >
              <img
                src="https://img.icons8.com/ios-filled/50/0077B5/linkedin.png"
                alt="LinkedIn"
                width="20"
              />
            </a>
            <a
              href="https://www.facebook.com/sharer/sharer.php?u=https://checkyourweb.site/"
              target="_blank"
              class="social_icon"
            >
              <img
                src="https://img.icons8.com/ios-filled/50/1877F2/facebook-new.png"
                alt="Facebook"
                width="20"
              />
            </a>
            <a
              href="https://twitter.com/intent/tweet?url=https://checkyourweb.site/"
              target="_blank"
              class="social_icon"
            >
              <img
                src="https://img.icons8.com/ios-filled/50/1DA1F2/twitter.png"
                alt="Twitter"
                width="20"
              />
            </a>
          </div> --}}
        </div>

        <!-- Step 2: Referral History -->
        <div class="tab-pane fade" id="step2" role="tabpanel">
          <p class="mb-3 orange-highlight">Your earned points are sharing!</p>
          <div class="table-responsive">
          <table class="table table-striped align-middle table-bordered">
  <thead class="table-light">
    <tr>
      <th>Invited</th>
      <th>Status</th>
      <th>Updated</th>
      <!--<th>Points Earned</th>-->
      <th>Reminder</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($referrals as $user)
      <tr>
        <td>{{ $user->name }}</td>
        <td>
            <span class="fw-bold badge bg-success">Active</span>
         </td>
        <td>{{ $user->updated_at->format('d/m/Y') }}</td>
        <!--<td class="text-success fw-bold">-->
        <!--  {{ $user->email_verified_at ? '400' : '-' }}-->
        <!--</td>-->
        <td>
          <button class="btn btn-outline-secondary btn-sm">
            Redeemed Points
          </button>
        </td>
      </tr>
    @empty
      <tr>
        <td colspan="5" class="text-center">No referral history found.</td>
      </tr>
    @endforelse
  </tbody>
</table>

          </div>
        </div>

        <!-- Step 3: Redeem Points -->
        <div class="tab-pane fade" id="step3" role="tabpanel">
          <div
            class="border rounded p-4 d-flex flex-column flex-md-row justify-content-between align-items-center gap-4 text-white"
            style="background: #023364"
          >
            <!-- Left Section: Icon + Info -->
            <div class="d-flex align-items-center gap-3 flex-grow-1">
              <!-- Icon -->
              <div
                class="bg-white rounded-circle d-flex align-items-center justify-content-center"
                style="width: 48px; height: 48px"
              >
                <img
                  src="https://img.icons8.com/ios-filled/50/000000/gift--v1.png"
                  alt="Gift Icon"
                  width="24"
                />
              </div>

              <!-- Text -->
              <div>
                <div class="fw-bold fs-5">Your Total Earned Points</div>
                <h1 class="mb-2">
                  <span class="text-warning fw-bold">600</span>
                  <sub class="fs-6">Points</sub>
                </h1>
                <p class="mb-0">
                  You can manage the points you have earned and redemption at
                  <a href="#" class="text-decoration-none text-warning"
                    >Wallet page</a
                  >
                </p>
              </div>
            </div>

            <!-- Redeem Button -->
            <div>
              <button class="btn btn-warning btn-lg fw-semibold">
                Redeem Points
              </button>
            </div>
          </div>
        </div>
      </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--=============================
    DASHBOARD START
  ==============================-->
@endsection

@push('scripts')

<script>
  function copyReferralLink(button) {
    const input = button.previousElementSibling;
    input.select();
    input.setSelectionRange(0, 99999); // For mobile

    try {
      const successful = document.execCommand('copy');
      if (successful) {
        // Show alert message
        const alertBox = document.getElementById('copyAlert');
        alertBox.style.display = 'block';

        // Hide after 2 seconds
        setTimeout(() => {
          alertBox.style.display = 'none';
        }, 2000);
      }
    } catch (err) {
      console.error('Failed to copy: ', err);
    }

    // Optional: Remove text selection
    window.getSelection().removeAllRanges();
  }
</script>

<script>
  const emailInput = document.getElementById('emailInput');
  const sendButton = document.getElementById('sendButton');

  emailInput.addEventListener('input', () => {
    sendButton.disabled = !emailInput.value.trim();
  });
</script>

<script>
  const referralUrl = "{{ url('/login?ref=' . Auth::user()->refer_code) }}";
</script>

 <script>
   document.getElementById('shareBtn').addEventListener('click', async function () {
    const shareData = {
        title: 'Check this out!',
        text: 'I found something interesting for you.',
        url: referralUrl
    };

    if (navigator.share) {
        try {
            await navigator.share(shareData);
            console.log('Shared successfully');
        } catch (err) {
            console.error('Share failed:', err);
        }
    } else {
        alert('Sharing is not supported on this device. Please copy the link manually.');
    }
});
  </script>


@endpush

<div class="container position-relative p-0 mt-90" style="max-width: 700px;">
    <h3 class="bg-theme-colored p-15 mt-0 mb-0 text-white">Make an Appointment</h3>
    <div class="section-content bg-white p-30">
        <div class="row">
            <div class="col-md-12">
                <!-- Booking Form Starts -->
                {{-- <p class="lead">Lorem ipsum dolor sit amet, consectetur elit.</p> --}}
                <!-- Appointment Form -->
                <form class="" method="post" action="{{ route('appointment.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group mb-10">
                                <input name="form_name" class="form-control" type="text" required="" value="{{ old('form_name') }}" placeholder="Enter Name" aria-required="true">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group mb-10">
                                <input name="form_email" class="form-control required email" type="email" value="{{ old('form_email') }}" placeholder="Enter Email" aria-required="true">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group mb-10">
                                <input name="form_phone" class="form-control required" type="number" value="{{ old('form_phone') }}" placeholder="Enter Phone Number" aria-required="true">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group mb-10">
                                <input name="form_appontment_date" class="form-control required datetime-picker" value="{{ old('form_appontment_date') }}" type="date" placeholder="Appoinment Date & Time" aria-required="true">
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-10">
                        <textarea name="form_message" class="form-control required" placeholder="Enter Message" rows="5" aria-required="true">{{ old('form_message') }}</textarea>
                    </div>
                    <div class="form-group mb-0 mt-20">
                        <button type="submit" class="btn btn-dark btn-theme-colored" data-loading-text="Please wait...">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <button title="Close (Esc)" type="button" class="mfp-close font-36">×</button>
</div>
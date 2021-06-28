<div class="container position-relative p-0 mt-90" style="max-width: 700px;">
    <h3 class="bg-theme-colored p-15 mt-0 mb-0 text-white">Ask Your Question</h3>
    <div class="section-content bg-white p-30">
        <div class="row">
            <div class="col-md-12">
                <!-- Appointment Form -->
                <form class="" method="post" action="{{ route('faq.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group mb-10">
                                <input name="name" class="form-control" type="text" value="{{ old('name') }}" required="" placeholder="Enter Name" aria-required="true">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group mb-10">
                                <input name="email" class="form-control required email" type="email" value="{{ old('email') }}" placeholder="Enter Email" aria-required="true">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group mb-10">
                                <input name="phone" class="form-control requireds" type="text" value="{{ old('phone') }}" placeholder="Enter Phone Number" aria-required="true">
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-10">
                        <textarea name="question" class="form-control required" placeholder="Ask your question" rows="5" aria-required="true">{{ old('question') }}</textarea>
                    </div>
                    <div class="form-group mb-0 mt-20">
                        <button type="submit" class="btn btn-dark btn-theme-colored" data-loading-text="Please wait...">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
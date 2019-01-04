@extends('layouts.main')

@section('content')

    {{-- First Row --}}
    <div id="home-slider" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ul class="carousel-indicators">
          <li data-target="#home-slider" data-slide-to="0" class="active"></li>
          <li data-target="#home-slider" data-slide-to="1"></li>
          <li data-target="#home-slider" data-slide-to="2"></li>
        </ul>
      
        <!-- The slideshow -->
        <div class="carousel-inner">


        <div class="carousel-caption">
            <h1 class="mb-5">
                A Great Firm that You can Trust for Covering Campaign and Community Management
            </h1>
            <div class="row">
                <div class="col-md-6 text-right">
                    <a class="btn btn-legitize text-white hvr-shrink">Get your ico posted</a>
                </div>
                <div class="col-md-6 text-left">
                    <a class="btn btn-legitize text-white hvr-shrink">Become a bounty hunter</a>
                </div>
            </div>
        </div>

        <div class="carousel-item active">
                <img src="{{ asset('images/home-page/slider/home-slide-1.jpg') }}" alt="Legitize team">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/home-page/slider/home-slide-2.jpg') }}" alt="Business partners">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/home-page/slider/home-slide-3.jpg') }}" alt="Grow with us">
            </div>
        </div>
      
        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#home-slider" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#home-slider" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
      
    </div>

    {{-- Second Row --}}
    <div class="container-fluid bg-white">
        <div class="container">
            <h2 class="text-center pt-5 mb-3 text-dark"><strong>Our ICOs and Bounty Hunters</strong></h2>
            <div class="row">
                <div class="col-md-6">
                    <p>
                        &nbsp;&nbsp;&nbsp;Legitize Drops is a campaign and community management platform 
                        that provides a full service on promoting ICOs through 
                        conducting bounty campaigns and Airdrop campaigns. We offer the 
                        best community managers who are suitable for a specific project. 
                    </p>
                    <p>
                        &nbsp;&nbsp;&nbsp;We will cover the community management of your Telegram community 
                        ensuring that investors’ inquiries will be answered accurately and 
                        providing them accommodating attention. We are a group of professional 
                        crypto ICO consultants who have technical expertise, are excellent at 
                        support and are led by an elite team of managers.
                    </p>
                    <p>
                        &nbsp;&nbsp;&nbsp;Bounty hunters are well entertained providing them a legitimate bounties and 
                        addressing any issues regarding their stakes earned. Ensuring that they will 
                        get the exact amount of stakes earned every bounty they participated. 
                    </p>
                    <p>
                        &nbsp;&nbsp;&nbsp;Thus we assure a project in our hands will gain what it takes to succeed.
                    </p>
                </div>
                <div class="col-md-6 mt-2">
                    <div class="card">
                        <img class="card-img-top hvr-grow" src="{!! asset('images/home-page/teamwork.jpg') !!}" alt="teamwork">
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Third Row --}}
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12" data-aos="fade-down">
                <h2 class="text-center mb-3 text-dark"><strong>Services</strong></h2>
                <h5><strong>What We Offer </strong></h5>
                <p>
                    Due to the rampant cases of scamming attempt nowadays, investors are afraid to invest 
                    in unpopular ICOs. Thus making some ICOs hard to reach their soft cap and hard cap or 
                    even failed. We are here to offer our service. We firstly investigate the legitimacy 
                    of a project before promoting and moreover caters their entry verification to give 
                    investors and bounty hunters a 100% legitimate project.
                </p>
                
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-12">
                <h2 class="text-center mb-3 text-dark"  data-aos="fade-right"><strong>Our Bounty Hunters</strong></h2>
                <div class="row mt-5">

                    <div class="col-md-6" data-aos="fade-right">
                        <div class="row">
                            <div class="col-md-2 text-center">
                                <a class="hvr-icon-float">
                                    <i class="fa fa-paperclip text-gray font-size-50px mt-4 mb-4 hvr-icon"></i>
                                </a>
                            </div>
                            <div class="col-md">
                                <div class="mb-2 text-orange">
                                    <h4>Campaign Management</h4>
                                </div>
                                <p>
                                    We will cover the overall operation of campaign management for you. 
                                    From Airdrop campaign to Bounty campaign. The Bounty Management team 
                                    are experienced crypto enthusiast around the world who had managed 
                                    various ICOs.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6" data-aos="fade-right">
                        <div class="row">
                            <div class="col-md-2 text-center">
                                <a class="hvr-icon-float">
                                    <i class="fa fa-search text-gray font-size-50px mt-4 mb-4 hvr-icon"></i>
                                </a>
                            </div>
                            <div class="col-md">
                                <div class="mb-2 text-orange">
                                    <h4>Entry Verification</h4>
                                </div>
                                <p>
                                    Upon taking partnership with us, your legitimacy will 
                                    be evaluated giving guarantee to our bounty hunters and 
                                    investors that their time, money, and effort will be worth-while. 
                                    We are giving full attention to your project investigating. 
                                    Reading your whitepaper and referring to the roadmap, verifying 
                                    the identity of the team behind the project and etc.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6" data-aos="fade-right">
                        <div class="row">
                            <div class="col-md-2 text-center">
                                <a class="hvr-icon-float">
                                    <i class="fa fa-globe text-gray font-size-50px mt-4 mb-4 hvr-icon"></i>
                                </a>
                            </div>
                            <div class="col-md">
                                <div class="mb-2 text-orange">
                                    <h4>Community Management</h4>
                                </div>
                                <p>
                                    Your Telegram Community will be managed by professional community 
                                    Managers and telegram moderators who has experty in that field. 
                                    Our Community Managers and moderators undergone an intensive 
                                    examination to test their capability and skills, thus ensuring that 
                                    only the best ones are hired.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6" data-aos="fade-right">
                        <div class="row">
                            <div class="col-md-2 text-center">
                                <a class="hvr-icon-float">
                                    <i class="fa fa-star text-gray font-size-50px mt-4 mb-4 hvr-icon"></i>
                                </a>
                            </div>
                            <div class="col-md">
                                <div class="mb-2 text-orange">
                                    <h4>Certified Community Managers</h4>
                                </div>
                                <p>
                                    Community Managers are well trained. They undergone intensive test 
                                    to sharpen their community management skill. They are certified 
                                    fluent in english and have good communication skill.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6" data-aos="fade-right">
                        <div class="row">
                            <div class="col-md-2 text-center">
                                <a class="hvr-icon-float">
                                    <i class="fa fa-list text-gray font-size-50px mt-4 mb-4 hvr-icon"></i>
                                </a>
                            </div>
                            <div class="col-md">
                                <div class="mb-2 text-orange">
                                    <h4>Legitized Campaigns</h4>
                                </div>
                                <p>
                                    All campaigns featured by us are verified. We evaluate the 
                                    credibility of the team and the potential of the project.
                                    No low quality icos and fake team featured by us. We ensure 
                                    that all campaigns are being "Legitized" by us.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6" data-aos="fade-right">
                        <div class="row">
                            <div class="col-md-2 text-center">
                                <a class="hvr-icon-float">
                                    <i class="fa fa-cog text-gray font-size-50px mt-4 mb-4 hvr-icon"></i>
                                </a>
                            </div>
                            <div class="col-md">
                                <div class="mb-2 text-orange">
                                    <h4>Control of your Assets</h4>
                                </div>
                                <p>
                                    In legitize we guarantee an accurate distribution of payments for hunter. 
                                    Hunters can set their personal info like wallet addresses and social 
                                    media accounts to ensure they are correct and will not result into any error.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6" data-aos="fade-right">
                        <div class="row">
                                <div class="col-md-2 text-center">
                                    <a class="hvr-icon-float">
                                        <i class="fa fa-users text-gray font-size-50px mt-4 mb-4 hvr-icon"></i>
                                    </a>
                                </div>
                            <div class="col-md">
                                <div class="mb-2 text-orange">
                                    <h4>Prioritized Hunters</h4>
                                </div>
                                <p>
                                    Hunting bounties and airdrops is not easy, it takes time and effort. 
                                    We make sure that all these will not be wasted. We did create an 
                                    innovative way of hunting airdrops and bounties easily through our website.
                                </p>
                            </div>
                        </div>
                    </div>                        
                </div>
            </div>
        </div>
    </div>

    {{-- Fourt Row --}}
    <div class="container-fluid bg-white">
        <div class="container">
            <div class="col-md-12">
                <h2 class="text-center pt-5 text-dark" data-aos="fade-left"><strong>Your ICO</strong></h2>
                <div class="row">
                    <div class="col-md-4">

                        <div class="card hvr-grow mt-3">
                            <img class="card-img-top" src="{{ asset('images/home-page/monitor.png') }}" alt="Card image cap">
                            <div class="card-body card-bg-monitor-participants">
                                    <div class="text-center text-white mb-4">
                                            <h4>Monitor of participants</h4>
                                    </div>
                                <p class="text-white">
                                    We give you an exclusive interface of our Website 
                                    where you can check the spreadsheet and monitor 
                                    the stakes earned by the hunters who joined your campaign.
                                </p>
                            </div>
                        </div>
                        <div class="card hvr-grow mt-3">
                            <img class="card-img-top" src="{{ asset('images/home-page/campaign.png') }}" alt="Card image cap">
                            <div class="card-body card-bg-campaigns">
                                    <div class="text-center text-white mb-4">
                                            <h4>Various Bounty Campaign</h4>
                                    </div>
                                <p class="text-white">
                                    Our bounty management service will include: Translation Campaign, 
                                    Signature Campaign, Twitter, Facebook, Telegram, and Content Creation.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card hvr-grow mt-3">
                            <img class="card-img-top" src="{{ asset('images/home-page/managers.png') }}" alt="Card image cap">
                            <div class="card-body card-bg-managers">
                                    <div class="text-center text-white mb-4">
                                        <h4>Verified Community Managers</h4>
                                    </div>
                                <p class="text-white">
                                    We display a profile infos of Community Managers who will suit for your 
                                    standards and work for you in exchange for your token.
                                    <br><br>
                                    - These Community Manager are trained under us.
                                </p>
                            </div>
                        </div>

                        <div class="card  hvr-grow mt-3" >
                            <img class="card-img-top" src="{{ asset('images/home-page/telegram.png') }}" alt="Card image cap">
                            <div class="card-body card-bg-telegram">
                                    <div class="text-center text-white mb-4">
                                        <h4>Telegram Community Boosting</h4>
                                    </div>
                                <p class="text-white">
                                    We boost the community chat of your project through our platform.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card hvr-grow mt-3">
                            <img class="card-img-top" src="{{ asset('images/home-page/token-friendly.png') }}" alt="Card image cap">
                            <div class="card-body card-bg-token-friendly">
                                    <div class="text-center text-white mb-4">
                                        <h4>Token Friendly</h4>
                                    </div>
                                <p class="text-white">
                                    Legitize is token friendly, we manage tokens from Waves, Ethereum, Omni, Komodo, Verge, Neo and others.
                                </p>
                            </div>
                        </div>

                        <div class="card hvr-grow mt-3">
                            <img class="card-img-top" src="{{ asset('images/home-page/share.png') }}" alt="Card image cap">
                            <div class="card-body card-bg-share">
                                    <div class="text-center text-white mb-4">
                                        <h4>Distribution of rewards</h4>
                                    </div>
                                <p class="text-white">
                                    We will distribute the tokens earned by our hunters. We ensure all will recieve the exact amount they must have.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

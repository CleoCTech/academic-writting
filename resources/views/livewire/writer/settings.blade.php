<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    @if ($component == 'component')
    @livewire('writer.settings.profile-setup')
    @elseif($component == 'contacts')
    @livewire('writer.settings.profile-setup')
    @elseif($component == '')
    @livewire('writer.settings.progress')
    @elseif($component == 'profile')
    @livewire('writer.settings.portfolio-setup')
    @elseif($component == 'id-verify')
    @livewire('writer.settings.verification')
    @elseif($component == 'id-front')
    @livewire('writer.settings.id-front')
    @elseif($component == 'id-back')
    @livewire('writer.settings.id-back')
    @elseif($component == 'id-selfie')
    @livewire('writer.settings.id-selfie')
    @elseif($component == 'education-verify')
    @livewire('writer.settings.education-verify')
    @elseif($component == 'upload-cert')
    @livewire('writer.settings.upload-cert')
    @elseif($component == 'upload-cert-selfie')
    @livewire('writer.settings.upload-cert-selfie')
    @elseif($component == 'work-experience')
    @livewire('writer.settings.work-experience')
    @elseif($component == 'test')
    @livewire('writer.settings.test')
    @elseif($component == 'test-begin')
    @livewire('writer.settings.test-begin')
    @endif
    {{-- @livewire('writer.settings.welcome') --}}


</div>

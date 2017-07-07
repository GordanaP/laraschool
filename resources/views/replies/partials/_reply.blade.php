<!-- pass reply object as vue property attributes and treat as JSON by adding:: -->

<reply :attributes="{{ $reply }}" inline-template v-cloak>
    <div class="panel panel-default" id="reply-{{ $reply->id }}">
        <div class="panel-heading" style="display: flex">

            <!-- Replier & date-->
            <div style="flex: 1">
                <a href="{{ route('profiles.show', $reply->user->name) }}">
                    {{ $reply->user_name }}
                </a>

                {{ $reply->created }}
            </div>

            <!-- Favorites -->
            @if (Auth::check())
                <div class="div">
                    <favorite :reply="{{ $reply }}"></favorite>
                </div>
            @endif
        </div>

        <!-- Reply -->
        <div class="panel-body">
            <div v-if="editing">
                <div class="form-group">
                    <textarea class="form-control" v-model="body"></textarea>
                </div>
                <button class="btn-link" @click="update">Update</button>
                <button class="btn-link" @click="cancel">Cancel</button>
            </div>

            <div v-else v-text="body"></div>
        </div>

        <!-- Action buttons -->
        @can('access', $reply)
            <div class="panel-footer">
                <button class="btn btn-warning pull-left"
                    @click="editing = true"
                >
                    Edit
                </button>

                <button class="btn btn-danger"
                    @click="destroy"
                >
                    Delete
                </button>
            </div>
        @endcan
    </div>
</reply>
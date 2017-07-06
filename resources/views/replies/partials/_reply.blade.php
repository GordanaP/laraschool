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
            <div class="div">
                @include('replies.partials._formFavorite')
            </div>
        </div>

        <!-- Reply -->
        <div class="panel-body">
            <div v-if="editing">
                <div class="form-group">
                    <textarea class="form-control" v-model="body"></textarea>
                </div>
                <button class="btn-link" @click="update">Update</button>
                <button class="btn-link" @click="editing = false">Cancel</button>
            </div>

            <div v-else v-text="body"></div>
        </div>

        <!-- Action buttons -->
        @can('access', $reply)
            <div class="panel-footer">
                <button type="submit" class="btn btn-warning pull-left"
                    @click="editing = true"
                >
                    Edit
                </button>

                @include('replies.partials._formDelete')
            </div>
        @endcan
    </div>
</reply>
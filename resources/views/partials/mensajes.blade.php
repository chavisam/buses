@if (session('status'))
                <div id="status" class="bg-green-300 border-t-4 border-green-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                  <div class="flex">
                    <div>
                      <p class="text-sm">{{ session('status') }}</p>
                    </div>
                  </div>
                </div>


               
  @endif

  @if(session('error'))
          <div id="error" class="bg-red-300 border-t-4 border-red-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                          <div class="flex">
                            <div>
                              <p class="text-sm">{{ session('error') }}</p>
                            </div>
                          </div>
                        </div>
          @endif